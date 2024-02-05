<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Roles extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'User'],
            ['name' => 'Admin'],
        ];

        // Using Query Builder
        $this->db->table('Roles')->insertBatch($data);
    }
}
