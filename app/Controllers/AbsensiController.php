<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\KehadiranModel;
use App\Models\IjinModel;
use App\Models\AlpaModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\GuruModel;

class AbsensiController extends Controller
{
    protected $kehadiranModel;
    protected $alpaModel;
    protected $ijinModel;

    public function __construct()
    {
        $this->kehadiranModel = new KehadiranModel();
        $this->alpaModel = new AlpaModel();
        $this->ijinModel = new IjinModel();
    }

    public function showAnalytics()
    {
        $nama_guru = $this->request->getGet('nama_guru');
        $tahun = $this->request->getGet('tahun');

        // Ambil data guru untuk dropdown
        $guruModel = new GuruModel(); // Pastikan model GuruModel sudah ada
        $data_guru = $guruModel->findAll();

        if (empty($nama_guru) || empty($tahun)) {
            return view('admin/data_hadir/analisa', ['error' => 'Nama guru dan tahun harus diisi', 'data_guru' => $data_guru]);
        }

        $data_kehadiran = $this->kehadiranModel->getKehadiranByGuruAndYear($nama_guru, $tahun);
        $data_ijin = $this->ijinModel->getIjinByGuruAndYear($nama_guru, $tahun);
        $data_alpa = $this->alpaModel->getAlpaByGuruAndYear($nama_guru, $tahun);

        // Prepare data untuk chart
        $chart_data = [];
        $labels = []; // Bulan Januari - Desember
        for ($i = 1; $i <= 12; $i++) {
            $labels[] = date("F", mktime(0, 0, 0, $i, 1, 2025)); // Format bulan
            $chart_data['kehadiran'][$i] = 0; // Inisialisasi poin kehadiran per bulan
            $chart_data['ijin'][$i] = 0; // Inisialisasi poin izin per bulan
            $chart_data['alpa'][$i] = 0; // Inisialisasi poin alpa per bulan
        }

        foreach ($data_kehadiran as $kehadiran) {
            $bulan = (int) date('n', strtotime($kehadiran['tanggal'])); // Ambil nomor bulan
            $chart_data['kehadiran'][$bulan] += $kehadiran['poin'];
        }

        foreach ($data_ijin as $ijin) {
            $bulan = (int) date('n', strtotime($ijin['tanggal'])); // Ambil nomor bulan
            $chart_data['ijin'][$bulan] += $ijin['poin'];
        }

        foreach ($data_alpa as $alpa) {
            $bulan = (int) date('n', strtotime($alpa['tanggal'])); // Ambil nomor bulan
            $chart_data['alpa'][$bulan] += $alpa['poin'];
        }

        $data = [
            'nama_guru' => $nama_guru,
            'tahun' => $tahun,
            'chart_data' => $chart_data,
            'labels' => $labels, // Label bulan
            'data_guru' => $data_guru, // Data guru untuk select
        ];

        return view('admin/data_hadir/analisa', $data);
    }
}
