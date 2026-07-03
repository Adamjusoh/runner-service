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
    public function getCustomerHistoryWithItems($customerId)
    {
        $orders = $this->select('orders.*, runs.location, runs.delivery_time, runs.delivery_fee, runs.status as run_status')
                    ->join('runs', 'runs.run_id = orders.run_id')
                    ->where('orders.customer_id', $customerId)
                    ->orderBy('orders.created_at', 'DESC')
                    ->findAll();
                    
        if (empty($orders)) {
            return [];
        }

        $orderIds = array_column($orders, 'order_id');
        
        $orderItemModel = new \App\Models\OrderItemModel();
        $allItems = $orderItemModel->whereIn('order_id', $orderIds)->findAll();
        
        // Group items by order_id
        $itemsByOrder = [];
        foreach ($allItems as $item) {
            $itemsByOrder[$item['order_id']][] = $item;
        }
        
        // Attach items to orders
        foreach ($orders as &$order) {
            $order['items'] = $itemsByOrder[$order['order_id']] ?? [];
        }
        
        return $orders;
    }

    public function createOrderWithItems($customerId, $runId, $deliveryAddress, $validItems)
    {
        $db = \Config\Database::connect();
        $db->transStart();

        $this->save([
            'customer_id'      => $customerId,
            'run_id'           => $runId,
            'delivery_address' => $deliveryAddress,
            'total_item_cost'  => 0.00,
            'status'           => 'paid',
        ]);

        $orderId = $this->getInsertID();
        $orderItemModel = new \App\Models\OrderItemModel();

        foreach ($validItems as $item) {
            $orderItemModel->save([
                'order_id'  => $orderId,
                'item_name' => $item['item_name'],
                'quantity'  => $item['quantity'],
            ]);
        }

        $db->transComplete();

        return $db->transStatus();
    }
}