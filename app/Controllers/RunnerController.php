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
        $runModel = new RunModel();
        $runnerId = (int) session()->get('user_id');

        $runModel->closeExpiredRunsForRunner($runnerId);

        $run = $runModel->where('run_id', $run_id)
            ->where('runner_id', $runnerId)
            ->first();

        if (!$run) {
            return redirect()->to('/runner/dashboard')->with('error', 'Run schedule not found.');
        }

        $data['run']          = $run;
        $data['shoppingList'] = $runModel->getShoppingList($run_id);
        $data['canComplete']  = $runModel->canMarkDelivered($run);

        return view('runner/active_run', $data);
    }

    public function completeRun($run_id = null)
    {
        $runModel = new RunModel();
        $runnerId = (int) session()->get('user_id');

        $runModel->closeExpiredRunsForRunner($runnerId);

        $run = $runModel->where('run_id', $run_id)
            ->where('runner_id', $runnerId)
            ->first();

        if (!$run) {
            return redirect()->to('/runner/dashboard')->with('error', 'Run schedule not found.');
        }

        if (!$runModel->canMarkDelivered($run)) {
            return redirect()->to('/runner/run/active/' . $run_id)->with('error', 'This run cannot be marked as delivered yet.');
        }

        $runModel->update($run_id, ['status' => 'delivered']);

        return redirect()->to('/runner/dashboard')->with('success', 'Run marked as delivered. Great job!');
    }
}
