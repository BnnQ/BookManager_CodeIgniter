<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Books extends Seeder
{
    public function run()
    {
        $data = [
            'title' => 'Sample Book',
            'price' => 19.99,
            'authorId' => 1, // assuming 1 is the id of the author
            'yearOfPublish' => 2020
        ];

        // Using Query Builder
        $this->db->table('Books')->insert($data);
    }
}