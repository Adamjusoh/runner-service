<?php

namespace App\Controllers;

use App\Models\RunModel;

class RunnerController extends BaseController
{
    public function index()
    {
        $runModel = new RunModel();
        $runnerId = (int) session()->get('user_id');

        $runModel->closeExpiredRunsForRunner($runnerId);

        $data['runs'] = $runModel->where('runner_id', $runnerId)
            ->orderBy('cutoff_time', 'DESC')
            ->findAll();

        return view('runner/dashboard', $data);
    }

    public function createRun()
    {
        return view('runner/create_run');
    }

    public function storeRun()
    {
        $rules = [
            'location'      => 'required|min_length[3]',
            'cutoff_time'   => 'required',
            'delivery_time' => 'required',
            'delivery_fee'  => 'required|numeric',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $cutoffTime = strtotime($this->request->getPost('cutoff_time'));
        $deliveryTime = strtotime($this->request->getPost('delivery_time'));
        $now = time();

        if ($cutoffTime <= $now) {
            return redirect()->back()->withInput()->with('error', 'Cut-off time must be in the future.');
        }

        if ($deliveryTime <= $cutoffTime) {
            return redirect()->back()->withInput()->with('error', 'Delivery time must be after the cut-off time.');
        }

        $runModel = new RunModel();

        $runModel->save([
            'runner_id'     => session()->get('user_id'),
            'location'      => $this->request->getPost('location'),
            'cutoff_time'   => $this->request->getPost('cutoff_time'),
            'delivery_time' => $this->request->getPost('delivery_time'),
            'delivery_fee'  => $this->request->getPost('delivery_fee'),
            'status'        => 'open',
        ]);

        return redirect()->to('/runner/dashboard')->with('success', 'New run scheduled successfully.');
    }

    public function activeRun($run_id = null)
    {
        $run = $this->getRunnerRun($run_id);

        if (!$run) {
            return redirect()->to('/runner/dashboard')->with('error', 'Run schedule not found.');
        }

        $runModel = new RunModel();
        $data['run']          = $run;
        $data['shoppingList'] = $runModel->getShoppingList($run_id);
        $data['canComplete']  = $runModel->canMarkDelivered($run);

        return view('runner/active_run', $data);
    }

    public function completeRun($run_id = null)
    {
        $run = $this->getRunnerRun($run_id);

        if (!$run) {
            return redirect()->to('/runner/dashboard')->with('error', 'Run schedule not found.');
        }

        $runModel = new RunModel();

        if (!$runModel->canMarkDelivered($run)) {
            return redirect()->to('/runner/run/active/' . $run_id)->with('error', 'This run cannot be marked as delivered yet.');
        }

        $runModel->update($run_id, ['status' => 'delivered']);

        return redirect()->to('/runner/dashboard')->with('success', 'Run marked as delivered. Great job!');
    }

    private function getRunnerRun($run_id)
    {
        $runModel = new RunModel();
        $runnerId = (int) session()->get('user_id');

        $runModel->closeExpiredRunsForRunner($runnerId);

        return $runModel->where('run_id', $run_id)
            ->where('runner_id', $runnerId)
            ->first();
    }
}
