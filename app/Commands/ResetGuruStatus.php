<?php

namespace App\Commands;

use App\Models\GuruModel;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class ResetGuruStatus extends BaseCommand
{
    protected $group       = 'Custom';
    protected $name        = 'guru:reset-status';
    protected $description = 'Reset semua status guru menjadi "belum absen".';

    public function run(array $params)
    {
        // Inisialisasi model
        $guruModel = new GuruModel();

        // Reset status guru
        $guruModel->resetStatus();

        // Output hasil
        CLI::write('Status semua guru berhasil di-reset menjadi "belum absen".', 'green');
    }
}
