<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Authors extends Seeder
{
    public function run()
    {
        $data = [
            'firstname' => 'John',
            'surname' => 'Doe',
            'yearOfBirth' => 1980
        ];

        // Using Query Builder
        $this->db->table('Authors')->insert($data);
    }
}