<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true, 
                'auto increment' => true 
            ],
            'id_guru' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false  
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false 
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false 
            ],
            'role' => [
                'type' => 'enum' ,
                'constraint' => ['guru','admin'],
                'default' => 'guru'
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_guru', 'guru', 'id');
        $this->forge->createTable('user');
    }
    
    public function down()
    {
        $this->forge->dropTable('user');
    }
}
