<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableIjin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'tanggal' => [
                'type' => 'DATE',
                'null' => false  
            ],
            'id_guru' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false 
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => false 
            ],
            'poin' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
                'null' => false 
            ]

        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_guru', 'guru', 'id');
        $this->forge->createTable('ijin');
    }
    
    public function down()
    {
        $this->forge->dropTable('ijin');
    }
}
