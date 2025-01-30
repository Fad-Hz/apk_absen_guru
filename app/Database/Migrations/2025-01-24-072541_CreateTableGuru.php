<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableGuru extends Migration
{
    public function up()
    {
        // $this->forge->addField([
        //     'id' => [
        //         'type' => 'INT',
        //         'constraint' => 11,
        //         'unsigned' => true,
        //         'auto increment' => true
        //     ],
        //     'nama_guru' => [
        //         'type' => 'VARCHAR',
        //         'constraint' => 11,
        //         null => false 
        //     ],
        //     'mata_pelajaran_id' => [
        //         'type' => 'INT',
        //         'constraint' => 11,
        //         'unsigned' => true,
        //         'null' => false 
        //     ],
        //     'status' => [
        //         'type' => 'ENUM',
        //         'constraint' => ['aktif', 'nonaktif'],
        //         'default' => 'aktif',
        //         'null' => false
        //     ]
        // ]);
        // $this->forge->addKey('id', true);
        // $this->forge->addForeignKey('mata_pelajaran_id', 'mata_pelajaran', 'id');
        // $this->forge->createTable('guru');
    }
    
    public function down()
    {
        $this->forge->dropTable('guru');
    }
}
