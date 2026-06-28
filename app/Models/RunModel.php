<?php

namespace App\Models;

use CodeIgniter\Model;

class RunModel extends Model
{
    protected $table            = 'runs';
    protected $primaryKey       = 'run_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    protected $allowedFields    = ['runner_id', 'location', 'cutoff_time', 'delivery_time', 'delivery_fee', 'status'];

    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    public function isAcceptingOrders(?array $run): bool
    {
        if ($run === null || $run['status'] !== 'open') {
            return false;
        }

        return strtotime($run['cutoff_time']) > time();
    }

    public function closeExpiredRunsForRunner(int $runnerId): void
    {
        $expiredRuns = $this->where('runner_id', $runnerId)
            ->where('status', 'open')
            ->where('cutoff_time <', date('Y-m-d H:i:s'))
            ->findAll();

        foreach ($expiredRuns as $expired) {
            $this->update($expired['run_id'], ['status' => 'closed_for_shopping']);
        }
    }

    public function canMarkDelivered(?array $run): bool
    {
        if ($run === null || $run['status'] === 'delivered' || $run['status'] === 'cancelled') {
            return false;
        }

        if ($run['status'] === 'closed_for_shopping') {
            return true;
        }

        return $run['status'] === 'open' && strtotime($run['cutoff_time']) <= time();
    }

    public function getShoppingList($run_id)
    {
        $db = \Config\Database::connect();
        
        // This builder joins 3 tables: order_items, orders, and users
        $builder = $db->table('order_items');
        $builder->select('order_items.item_name, order_items.quantity as total_quantity, users.full_name as customer_name, orders.delivery_address');
        $builder->join('orders', 'orders.order_id = order_items.order_id');
        $builder->join('users', 'users.user_id = orders.customer_id');
        $builder->where('orders.run_id', $run_id);
        $builder->orderBy('users.full_name', 'ASC');
        
        return $builder->get()->getResultArray();
    }
}