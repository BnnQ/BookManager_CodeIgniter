<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InitialMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'firstname' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'surname' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'yearOfBirth' => [
                'type' => 'YEAR',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        // Define primary key
        $this->forge->addKey('id', true);

        $this->forge->createTable('Authors');

        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
            ],
            'authorId' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'yearOfPublish' => [
                'type' => 'YEAR',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        // Define primary key
        $this->forge->addKey('id', true);

        // Define foreign key
        $this->forge->addForeignKey('authorId','Authors','id','CASCADE','CASCADE');

        $this->forge->createTable('Books');

        $this->forge->addField([
            'Id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'Name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);

        // Define primary key
        $this->forge->addKey('Id', true);

        $this->forge->createTable('Roles');

        $this->forge->addField([
            'Id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'Login' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'HashedPassword' => [
                'type' => 'VARCHAR',
                'constraint' => '255', // Assuming you're using a hash like bcrypt
            ],
            'Email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'RoleId' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'LastAuthenticationToken' => [
                'type' => 'VARCHAR',
                'constraint' => '255', // Adjust as needed for your token length
            ],
        ]);

        // Define primary key
        $this->forge->addKey('Id', true);

        // Define foreign key
        $this->forge->addForeignKey('RoleId','Roles','Id','CASCADE','CASCADE');

        $this->forge->createTable('Users');
    }

    public function down()
    {
        $this->forge->dropTable('Authors');
        $this->forge->dropTable('Books');
        $this->forge->dropTable('Roles');
        $this->forge->dropTable('Users');
    }

}
