<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ScanQrModel;
use CodeIgniter\I18n\Time;

class ScanQrController extends BaseController
{
    public function aksi_generate_scan()
    {
        $scan_qr = new ScanQrModel();
        $today = Time::now('Asia/Jakarta')->toDateString();
        if ($scan_qr->isGenerated($today)) {
            return redirect()->to('/admin/datascan')->with('error', 'QR sudah di generate untuk hari ini!');
        }
        $data = [
            'generate_scan' => uniqid('QR_'),
            'tanggal' => $today
        ];
        $scan_qr->insert($data);
        return redirect()->to('/admin/datascan')->with('success', 'QR berhasil di generate');
    }
}
