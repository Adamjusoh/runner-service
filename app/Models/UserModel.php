<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    // These are the fields allowed to be inserted/updated
    protected $allowedFields    = ['full_name', 'email', 'password_hash', 'user_type'];

    // Automatically manage created_at and updated_at timestamps
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
}