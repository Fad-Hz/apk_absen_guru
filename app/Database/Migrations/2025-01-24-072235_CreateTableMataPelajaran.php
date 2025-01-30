<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableMataPelajaran extends Migration
{
    public function up()
    {
        // $this->forge->addField([
        //     'id' => [
        //         'type' => 'INT',
        //         'constraint' => 11,
        //         'unsigned' => true,
        //         'auto_increment' => true
        //     ],
        //     'nama_mata_pelajaran' => [
        //         'type' => 'VARCHAR',
        //         'constraint' => 50,
        //         'null' => false
        //     ]
        // ]);
        // $this->forge->addKey('id', true);
        // $this->forge->createTable('mata_pelajaran');
    }
    
    public function down()
    {
        $this->forge->dropTable('mata_pelajaran');
    }
}
