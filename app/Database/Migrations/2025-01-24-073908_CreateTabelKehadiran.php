<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTabelKehadiran extends Migration
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
            'jam_masuk' => [
                'type' => 'TIME',
                'null' => false 
            ],
            'jam_keluar' => [
                'type' => 'TIME',
                'null' => false 
            ],
            'poin' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false ,
                'default' => 0
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_guru','guru','id');
        $this->forge->createTable('kehadiran');
    }
    
    public function down()
    {
        $this->forge->dropTable('kehadiran');
    }
}
