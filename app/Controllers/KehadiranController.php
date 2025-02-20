<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuruModel;
use App\Models\KehadiranModel;
use App\Models\PenggajianModel;
use App\Models\ScanQrModel;
use CodeIgniter\HTTP\ResponseInterface;

class KehadiranController extends BaseController
{
    protected $scan;
    protected $kehadiran;
    protected $guru;
    protected $penggajian;

    public function __construct()
    {
        $this->scan = new ScanQrModel();
        $this->kehadiran = new KehadiranModel();
        $this->guru = new GuruModel();
        $this->penggajian = new PenggajianModel();
    }

    public function index() // This will now handle the initial scan selection
    {
        return view('user/pilih_scan', ['title' => 'Absen Hari ini']); // Create a view for scan selection
    }

    public function showMasuk() // This will now handle the initial scan selection
    {
        return view('user/scan_masuk', ['title' => 'Presensi Masuk']); // Create a view for scan selection
    }

    public function showKeluar() // This will now handle the initial scan selection
    {
        return view('user/scan_keluar', ['title' => 'Presensi Keluar']); // Create a view for scan selection
    }

    public function scan_masuk()
    {
        date_default_timezone_set('Asia/Jakarta');
        $id_guru = session()->get('id_guru');
        $kode_qr = $this->request->getPost('kode_qr');
        $waktu_sekarang = date('H:i:s');
        $tanggal = date('Y-m-d');
        $latitude = $this->request->getPost('latitude');
        $longitude = $this->request->getPost('longitude');

        if (!$kode_qr) {
            return redirect()->back()->with('error', 'Anda belum scan.');
        }

        $qrValid = $this->scan->where('generate_scan', $kode_qr)->first();
        if (!$qrValid) {
            return redirect()->back()->with('error', 'QR Code kadaluarsa atau tidak valid.');
        }

        // Cek apakah sudah absen masuk hari ini
        $kehadiranHariIni = $this->kehadiran
            ->where('id_guru', $id_guru)
            ->where('tanggal', $tanggal)
            ->first();

        if ($kehadiranHariIni) {
            return redirect()->back()->with('error', 'Anda sudah absen hari ini.');
        }

        // Ambil jam masuk dari database
        $guru = $this->guru->select('jam_masuk')->where('id', $id_guru)->first();
        $jam_masuk_guru = $guru['jam_masuk'] ?? null;

        if (!$jam_masuk_guru) {
            return redirect()->back()->with('error', 'Jam Masuk Guru Belum di Set. Harap Hubungi Admin.');
        }

        // Tentukan status "Tepat Waktu" atau "Terlambat"
        $status = ($waktu_sekarang <= $jam_masuk_guru) ? 'tepat waktu' : 'terlambat';

        // Simpan data presensi
        $data = [
            'id_guru' => $id_guru,
            'tanggal' => $tanggal,
            'jam_masuk' => $waktu_sekarang,
            'status' => $status,
            'poin' => 1, // Bisa dibuat dinamis nanti
            'kode_qr' => $kode_qr,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ];

        $this->kehadiran->insert($data);
        $this->guru->update($id_guru, ['status' => 'hadir']);
        $total_gaji_hari_ini = $this->penggajian->hitungGajiHarian($id_guru, $tanggal);
        $penggajianModel = new PenggajianModel();
        $penggajianModel->insert([
            'id_guru' => $id_guru,
            'tanggal_gaji' => $tanggal,
            'total_gaji' => $total_gaji_hari_ini,
            'pengurangan_gaji' => 0,
            'sisa_gaji' => $total_gaji_hari_ini
        ]);

        return redirect()->back()->with('success', 'Presensi masuk berhasil! Gaji hari ini: Rp ' . number_format($total_gaji_hari_ini, 0, ',', '.'));
    }

    public function scan_keluar()
    {
        date_default_timezone_set('Asia/Jakarta');
        $id_guru = session()->get('id_guru');
        $kode_qr = $this->request->getPost('kode_qr');
        $waktu_sekarang = date('H:i:s');
        $tanggal = date('Y-m-d');

        if (!$kode_qr) {
            return redirect()->back()->with('error', 'Anda belum scan.');
        }

        $qrValid = $this->scan->where('generate_scan', $kode_qr)->first();
        if (!$qrValid) {
            return redirect()->back()->with('error', 'QR Code kadaluarsa atau tidak valid.');
        }

        // Cek apakah sudah presensi masuk hari ini
        $kehadiran_hari_ini = $this->kehadiran
            ->where('id_guru', $id_guru)
            ->where('tanggal', $tanggal)
            ->first();

        if (!$kehadiran_hari_ini) {
            return redirect()->back()->with('error', 'Anda belum melakukan presensi masuk!');
        }

        // Ambil jam keluar dari database
        $guru = $this->guru->select('jam_keluar')->where('id', $id_guru)->first();
        $jam_keluar_guru = $guru['jam_keluar'] ?? null;

        if (!$jam_keluar_guru) {
            return redirect()->back()->with('error', 'Jam Keluar Guru Belum di Set. Harap Hubungi Admin.');
        }

        // Cek apakah sudah absen keluar
        if ($kehadiran_hari_ini['jam_keluar'] != '00:00:00') {
            return redirect()->back()->with('error', 'Anda sudah melakukan presensi keluar!');
        }

        // Cek apakah sudah waktunya keluar
        if ($waktu_sekarang < $jam_keluar_guru) {
            return redirect()->back()->with('error', 'Belum Waktunya Presensi Keluar.');
        }

        // Update data presensi dengan jam keluar
        $this->kehadiran->update($kehadiran_hari_ini['id'], ['jam_keluar' => $waktu_sekarang]);

        return redirect()->back()->with('success', 'Presensi keluar berhasil.');
    }

    public function history()
    {
        $id_guru = session()->get('id_guru');
        $bulan = $this->request->getGet('bulan');
        $tahun = $this->request->getGet('tahun');

        // Get current month and year if not selected
        if (empty($bulan) || empty($tahun)) {
            $bulan = date('m');  // Current month
            $tahun = date('Y'); // Current year
        }

        $history = $this->kehadiran
            ->select('kehadiran.*, guru.jam_masuk as jam_mengajar, guru.jam_keluar as jam_pulang')
            ->join('guru', 'kehadiran.id_guru = guru.id')
            ->where('kehadiran.id_guru', $id_guru)
            ->where('MONTH(kehadiran.tanggal)', $bulan)
            ->where('YEAR(kehadiran.tanggal)', $tahun)
            ->findAll();


        $data = [
            'history' => $history,
            'title' => 'History Absensi',
            'tahun' => $tahun,
            'bulan' => $bulan
        ];

        return view('user/history', $data); // Create 'history_view.php'
    }
}
