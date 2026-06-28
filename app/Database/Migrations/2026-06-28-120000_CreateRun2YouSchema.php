<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRun2YouSchema extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'full_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'password_hash' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'user_type' => [
                'type'       => 'ENUM',
                'constraint' => ['customer', 'runner', 'admin'],
                'default'    => 'customer',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('users');

        $this->forge->addField([
            'run_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'runner_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'location' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'cutoff_time' => [
                'type' => 'DATETIME',
            ],
            'delivery_time' => [
                'type' => 'DATETIME',
            ],
            'delivery_fee' => [
                'type'       => 'DECIMAL',
                'constraint' => '8,2',
                'default'    => '0.00',
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['open', 'closed_for_shopping', 'delivered', 'cancelled'],
                'default'    => 'open',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('run_id', true);
        $this->forge->addKey('runner_id');
        $this->forge->addForeignKey('runner_id', 'users', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('runs');

        $this->forge->addField([
            'order_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'customer_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'run_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'delivery_address' => [
                'type' => 'TEXT',
            ],
            'total_item_cost' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'default'    => '0.00',
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'paid', 'cancelled'],
                'default'    => 'paid',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('order_id', true);
        $this->forge->addKey(['customer_id', 'run_id']);
        $this->forge->addForeignKey('customer_id', 'users', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('run_id', 'runs', 'run_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('orders');

        $this->forge->addField([
            'item_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'order_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'item_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'quantity' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'default'    => 1,
            ],
            'estimated_price' => [
                'type'       => 'DECIMAL',
                'constraint' => '8,2',
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('item_id', true);
        $this->forge->addKey('order_id');
        $this->forge->addForeignKey('order_id', 'orders', 'order_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('order_items');
    }

    public function down(): void
    {
        $this->forge->dropTable('order_items', true);
        $this->forge->dropTable('orders', true);
        $this->forge->dropTable('runs', true);
        $this->forge->dropTable('users', true);
    }
}
