<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuruModel;
use App\Models\KehadiranModel;
use App\Models\ScanQrModel;
use CodeIgniter\HTTP\ResponseInterface;

class KehadiranController extends BaseController
{
    protected $scan;
    protected $kehadiran;
    protected $guru;

    public function __construct()
    {
        $this->scan = new ScanQrModel();
        $this->kehadiran = new KehadiranModel();    
        $this->guru = new GuruModel();
    }

    public function scan_masuk()
    {
        date_default_timezone_set('Asia/Jakarta');
        $id_guru = session()->get('id_guru');
        $kode_qr = $this->request->getPost('kode_qr');
        $waktu_sekarang = date('H:i');
        $tanggal = date('Y-m-d');
        $qrValid = $this->scan->where('generate_scan', $kode_qr)->first();

        if (!$qrValid) {
            return redirect()->to('/absen')->with('error', 'QR Code tidak valid.');
        }

        // Cek apakah guru sudah absen hari ini
        $kehadiranHariIni = $this->kehadiran
            ->where('id_guru', $id_guru)
            ->where('tanggal', $tanggal)
            ->first();
            
            if ($kehadiranHariIni) {
                return redirect()->to('/absen')->with('error', 'Anda sudah absen hari ini.');
        }
        
        $status = ($waktu_sekarang <= '07:30' ? 'tepat waktu' : 'terlambat');
        
        $data = [
            'id_guru' => $id_guru,
            'tanggal' => $tanggal,
            'jam_masuk' => $waktu_sekarang,
            'status' => $status ,
            'poin' => 1,
            'kode_qr' => $kode_qr,
        ];
        
        $this->kehadiran->insert($data);
        $this->guru->update($id_guru, ['status' => 'hadir']);
        
        return redirect()->to('/absen')->with('success', 'Presensi masuk berhasil!');
    }
    
    public function scan_keluar()
    {
        date_default_timezone_set('Asia/Jakarta');
        $id_guru = session()->get('id_guru');
        $kode_qr = $this->request->getPost('kode_qr');
        $waktu_sekarang = date('H:i');
        $tanggal = date('Y-m-d');

        $qrValid = $this->scan->where('generate_scan', $kode_qr)->first();
        
        if (!$qrValid) {
            return redirect()->to('/absen')->with('error', 'QR Code tidak valid.');
        }
        
        $kehadiran_hari_ini = $this->kehadiran
            ->where('id_guru', $id_guru)
            ->where('tanggal', $tanggal)
            ->first();

        if (!$kehadiran_hari_ini){
            return redirect()->to('/absen')->with('error', 'Anda belum melakukan presensi masuk!');
        }
        
        if ($kehadiran_hari_ini['jam_keluar'] != '00:00:00') {
            return redirect()->to('/absen')->with('error', 'Anda sudah melakukan presensi keluar!');
        }

        $data = [
            'jam_keluar' => $waktu_sekarang,
            'kode_qr' => $kode_qr,
        ];
        $this->kehadiran->update($kehadiran_hari_ini['id'], $data);
        $this->guru->update($id_guru, ['status' => 'hadir']);
        
        return redirect()->to('/absen')->with('success', 'presensi keluar berhasil');
        
    }
}
