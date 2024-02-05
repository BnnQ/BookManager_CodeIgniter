<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('Roles');
        $this->call('Users');
        $this->call('Authors');
        $this->call('Books');
    }
}