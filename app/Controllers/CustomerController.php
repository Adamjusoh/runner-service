<?php

namespace App\Controllers;

use App\Models\RunModel;
use App\Models\OrderModel;
use App\Models\OrderItemModel;

class CustomerController extends BaseController
{
    public function index()
    {
        $runModel = new RunModel();

        $data['activeRuns'] = $runModel->where('status', 'open')
            ->where('cutoff_time >', date('Y-m-d H:i:s'))
            ->orderBy('cutoff_time', 'ASC')
            ->findAll();

        return view('customer/dashboard', $data);
    }

    public function viewRun($run_id = null)
    {
        $runModel = new RunModel();
        $run = $runModel->find($run_id);

        if (!$runModel->isAcceptingOrders($run)) {
            return redirect()->to('/customer/dashboard')->with('error', 'This run is no longer accepting orders.');
        }

        $data['run'] = $run;
        return view('customer/view_run', $data);
    }

    public function placeOrder()
    {
        $runId = $this->request->getPost('run_id');
        $itemNames = $this->request->getPost('item_name');
        $quantities = $this->request->getPost('quantity');
        $deliveryAddress = trim((string) $this->request->getPost('delivery_address'));

        if (empty($runId)) {
            return redirect()->back()->with('error', 'Invalid run selected.');
        }

        $runModel = new RunModel();
        $run = $runModel->find($runId);

        if (!$runModel->isAcceptingOrders($run)) {
            return redirect()->to('/customer/dashboard')->with('error', 'This run is no longer accepting orders.');
        }

        if ($deliveryAddress === '') {
            return redirect()->back()->with('error', 'Please provide a delivery address.');
        }

        $validItems = [];
        if (is_array($itemNames)) {
            foreach ($itemNames as $index => $name) {
                $name = trim((string) $name);
                $quantity = isset($quantities[$index]) ? (int) $quantities[$index] : 0;

                if ($name !== '' && $quantity > 0) {
                    $validItems[] = [
                        'item_name' => $name,
                        'quantity'  => $quantity,
                    ];
                }
            }
        }

        if ($validItems === []) {
            return redirect()->back()->with('error', 'Your order must include at least one item with a quantity greater than zero.');
        }

        $orderModel = new OrderModel();

        $success = $orderModel->createOrderWithItems(session()->get('user_id'), $runId, $deliveryAddress, $validItems);

        if (!$success) {
            return redirect()->back()->with('error', 'Failed to place order. Please try again.');
        }

        return redirect()->to('/customer/dashboard')->with('success', 'Order placed successfully! The runner will deliver it soon.');
    }

    public function history()
    {
        $orderModel = new OrderModel();
        $data['orders'] = $orderModel->getCustomerHistoryWithItems(session()->get('user_id'));

        return view('customer/history', $data);
    }
}
