<?php

namespace App\Controllers;

use App\Models\RunModel;
use App\Models\OrderModel;
use App\Models\OrderItemModel;
use CodeIgniter\Controller;

class CustomerController extends BaseController
{
    // Display the Customer Dashboard with all active marketplace runs
    public function index()
    {
        $runModel = new RunModel();
        
        // Fetch runs that are still open for orders, ordering by closest cut-off time
        $data['activeRuns'] = $runModel->where('status', 'open')
                               ->where('cutoff_time >', date('Y-m-d H:i:s')) // Only show if cutoff time is in the future
                               ->orderBy('cutoff_time', 'ASC')
                               ->findAll();

        return view('customer/dashboard', $data);
    }

    // View details of a specific scheduled run to add items to it
    public function viewRun($run_id = null)
    {
        $runModel = new RunModel();
        $run = $runModel->find($run_id);

        if (!$run || $run['status'] !== 'open') {
            return redirect()->to('/customer/dashboard')->with('error', 'This run is no longer accepting orders.');
        }

        $data['run'] = $run;
        return view('customer/view_run', $data);
    }

    // Process the grocery order form submission (Creates Order + Order Items)
    public function placeOrder()
    {
        $runId = $this->request->getPost('run_id');
        $itemNames = $this->request->getPost('item_name');
        $quantities = $this->request->getPost('quantity');

        // Get the delivery address from the form
        $deliveryAddress = $this->request->getPost('delivery_address');

        if (empty($itemNames) || empty($runId)) {
            return redirect()->back()->with('error', 'Your order cannot be empty.');
        }

        // validate that the address isnt empty
        if (empty($deliveryAddress)) {
            return redirect()->back()->with('error', 'Please provide a delivery address.');
        }

        $orderModel = new OrderModel();
        $orderItemModel = new OrderItemModel();

        // Start a database transaction to ensure data safety across multiple tables
        $db = \Config\Database::connect();
        $db->transStart();

        // 1. Insert the primary order record
        $orderModel->save([
            'customer_id'     => session()->get('user_id'),
            'run_id'          => $runId,
            'delivery_address' => $deliveryAddress,
            'total_item_cost' => 0.00, // Can be updated post-delivery if prices fluctuate
            'status'          => 'paid'   // Simulating immediate checkout payment
        ]);

        $orderId = $orderModel->getInsertID();

        // 2. Loop through and insert each item linked to this order
        foreach ($itemNames as $index => $name) {
            if (!empty($name)) {
                $orderItemModel->save([
                    'order_id'  => $orderId,
                    'item_name' => $name,
                    'quantity'  => intval($quantities[$index]),
                ]);
            }
        }

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->with('error', 'Failed to place order. Please try again.');
        }

        return redirect()->to('/customer/dashboard')->with('success', 'Order placed successfully! The runner will deliver it soon.');
    }

    // Add this inside CustomerController class
    public function history()
    {
        $orderModel = new OrderModel();
        $orderItemModel = new OrderItemModel();

        // 1. Get all orders for the logged-in customer using our new Model function
        $orders = $orderModel->getCustomerHistory(session()->get('user_id'));

        // 2. Loop through the orders and attach their specific items
        foreach ($orders as &$order) {
            $order['items'] = $orderItemModel->where('order_id', $order['order_id'])->findAll();
        }

        $data['orders'] = $orders;
        
        return view('customer/history', $data);
    }
}