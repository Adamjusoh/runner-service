<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'full_name'     => 'Platform Admin',
            'email'         => 'admin@run2you.local',
            'password_hash' => password_hash('Admin123!', PASSWORD_DEFAULT),
            'user_type'     => 'admin',
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ];

        $existing = $this->db->table('users')->where('email', $data['email'])->get()->getRowArray();

        if ($existing === null) {
            $this->db->table('users')->insert($data);
        }
    }
}
