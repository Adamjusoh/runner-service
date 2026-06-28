<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RunModel;
use App\Models\OrderModel;
use CodeIgniter\Controller;

class AdminController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $runModel = new RunModel();
        
        // 1. Calculate User Statistics
        $data['totalCustomers'] = $userModel->where('user_type', 'customer')->countAllResults();
        $data['totalRunners']   = $userModel->where('user_type', 'runner')->countAllResults();
        
        // 2. Calculate Run Statistics
        $data['activeRuns']    = $runModel->where('status', 'open')->countAllResults();
        $data['completedRuns'] = $runModel->where('status', 'delivered')->countAllResults();

        // 3. Financial Calculation (20% Platform Commission)
        // We join Orders and Runs to get the specific delivery fee for each paid order
        $db = \Config\Database::connect();
        $query = $db->query("
            SELECT SUM(runs.delivery_fee * 0.20) as total_revenue 
            FROM orders 
            JOIN runs ON orders.run_id = runs.run_id 
            WHERE orders.status = 'paid'
        ");
        
        $revenueRow = $query->getRow();
        $data['platformRevenue'] = $revenueRow->total_revenue ?? 0.00;

        return view('admin/dashboard', $data);
    }

    // Placeholder method for user management (can be expanded later)
    public function manageUsers()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->orderBy('created_at', 'DESC')->findAll();
        
        return view('admin/users', $data);
    }
}