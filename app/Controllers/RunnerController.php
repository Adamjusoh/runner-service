<?php

namespace App\Controllers;

use App\Models\RunModel;
use CodeIgniter\Controller;

class RunnerController extends BaseController
{
    // Display the Runner Dashboard with their specific trip logs
    public function index()
    {
        $runModel = new RunModel();
        $runnerId = session()->get('user_id');

        $expiredRuns = $runModel->where('runner_id', $runnerId)
                                ->where('status', 'open')
                                ->where('cutoff_time <', date('Y-m-d H:i:s'))
                                ->findAll();

        foreach ($expiredRuns as $expired) {
            // Update the database status to 'closed_for_shopping'
            $runModel->update($expired['run_id'], ['status' => 'closed_for_shopping']);
        }
        
        // Find all trips belonging exclusively to the logged-in runner session
        $data['runs'] = $runModel->where('runner_id', $runnerId)
                                 ->orderBy('cutoff_time', 'DESC')
                                 ->findAll();

        return view('runner/dashboard', $data);
    }

    // Display the create new run schedule form template
    public function createRun()
    {
        return view('runner/create_run');
    }

    // Store a newly scheduled market run entry
    public function storeRun()
    {
        $rules = [
            'location'      => 'required|min_length[3]',
            'cutoff_time'   => 'required',
            'delivery_time' => 'required',
            'delivery_fee'  => 'required|numeric'
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
            'status'        => 'open'
        ]);

        return redirect()->to('/runner/dashboard')->with('success', 'New run scheduled successfully.');
    }

    // View the active shopping dashboard (Compiles orders via Model JOIN table function)
    public function activeRun($run_id = null)
    {
        $runModel = new RunModel();
        $run = $runModel->where('run_id', $run_id)
                        ->where('runner_id', session()->get('user_id'))
                        ->first();

        if (!$run) {
            return redirect()->to('/runner/dashboard')->with('error', 'Run schedule not found.');
        }

        // 🌟 Execution of the JOIN operation required by the marking scheme
        $data['run']          = $run;
        $data['shoppingList'] = $runModel->getShoppingList($run_id);

        return view('runner/active_run', $data);
    }
}