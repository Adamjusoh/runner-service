<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderItemModel extends Model
{
    protected $table            = 'order_items';
    protected $primaryKey       = 'item_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    protected $allowedFields    = ['order_id', 'item_name', 'quantity', 'estimated_price'];
    
    // Notice: We don't use timestamps here because we didn't add created_at/updated_at to this table in the migration.
    protected $useTimestamps    = false; 
}