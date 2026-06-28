<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table            = 'orders';
    protected $primaryKey       = 'order_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    protected $allowedFields    = ['customer_id', 'run_id', 'delivery_address', 'total_item_cost', 'status'];

    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    
    // Optional JOIN example: Get orders with customer details
    public function getOrdersWithDetails()
    {
        return $this->select('orders.*, users.full_name, users.email')
                    ->join('users', 'users.user_id = orders.customer_id')
                    ->findAll();
    }

    // Order history
    public function getCustomerHistory($customerId)
    {
        return $this->select('orders.*, runs.location, runs.delivery_time, runs.delivery_fee, runs.status as run_status')
                    ->join('runs', 'runs.run_id = orders.run_id')
                    ->where('orders.customer_id', $customerId)
                    ->orderBy('orders.created_at', 'DESC')
                    ->findAll();
    }
}