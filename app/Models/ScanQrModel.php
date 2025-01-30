<?php

namespace App\Models;

use CodeIgniter\Model;

class ScanQrModel extends Model
{
    protected $table            = 'scan_qr';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['tanggal','generate_scan'];

    public function isGenerated($date)
    {
        return $this->where('tanggal', $date)->first() !== null;
    }
    public function isValidQr($kode_qr)
    {
        return $this->where('generate_scan', $kode_qr)->first();
    }

}
