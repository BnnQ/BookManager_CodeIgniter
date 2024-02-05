<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $data = [
            'Login' => 'admin',
            'HashedPassword' => password_hash("Qwerty1234%", PASSWORD_DEFAULT), // replace with actual hashed password
            'Email' => 'admin@gmail.com', // replace with actual email
            'RoleId' => 2,
            'LastAuthenticationToken' => ''
        ];

        // Using Query Builder
        $this->db->table('Users')->insertBatch($data);
    }
}