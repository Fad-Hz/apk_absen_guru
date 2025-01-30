<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateScanQrTable extends Migration
{
    public function up()
    {
        // $this->forge->addField([
        //     'id' => [
        //         'type' => 'INT',
        //         'constraint' => 11,
        //         'unsigned' => true,
        //         'auto_increment' => true,
        //     ],
        //     'tanggal' => [
        //         'type' => 'DATE',
        //         'null' => false 
        //     ],
        //     'generate_scan' => [
        //         'type' => 'TEXT',
        //         'null' => false 
        //     ]
        // ]);

        // $this->forge->addKey('id', true);
        // $this->forge->createTable('scan_qr');
    }
    
    public function down()
    {
        $this->forge->dropTable('scan_qr');
    }
}
