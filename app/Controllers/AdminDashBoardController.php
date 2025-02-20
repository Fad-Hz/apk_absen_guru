<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlpaModel;
use App\Models\GuruModel;
use App\Models\IJinModel;
use App\Models\KehadiranModel;
use App\Models\MataPelajaranModel;
use App\Models\ScanQrModel;

class AdminDashBoardController extends BaseController
{
    public function index()
    {
        if (session()->get('role') != 'admin') {
             return redirect()->to('/')->with('error','Halaman tersebut hanya milik admin!');
         }
        $data = [
            'title' => 'Dashboard',
        ];
        return view('admin/dashboard', $data);
    }
    public function show_mapel()
    {
        $mata_pelajaran = new MataPelajaranModel();

        $data = [
            'title' => 'Data Mata Pelajaran',
            'mapel' => $mata_pelajaran->getMapelWithGuru()
        ];
        return view('admin/data_mapel/index', $data);
    }
    public function show_scan()
    {
        $scan_qr = new ScanQrModel();

        // kadaluarsa perhari
        // $today = Time::now('Asia/Jakarta')->toDateString();
        // $scan_qr->where('tanggal', $today)->first();
        
        $data = [
            'title' => 'Scan Qr',
            'scan' => $scan_qr->findAll() 
        ];
        return view('admin/data_qr/index', $data);
    }
    public function show_guru()
    {
        $guru_model = new GuruModel();
        $data = [
            'title' => 'Data Guru dan Absensi',
            'guru' => $guru_model->findAll()
        ];
        return view('admin/data_guru/index', $data);
    }
    
    public function show_ijin()
    {
        $ijin_model = new IJinModel();
        $tanggal = date('Y-m-d');
        $ijin_hari_ini = $ijin_model->getIjinWithGuru($tanggal);
        $data = [
            'title' => 'Data Guru dan Absensi',
            'ijin' => $ijin_hari_ini,
            'total_poin' => $ijin_model->getTotalPoinIjin()
        ];
        return view('admin/data_ijin/index', $data);
    }
    public function show_hadir()
    {
        date_default_timezone_set('Asia/Jakarta');
        $hadir = new KehadiranModel();
        $tanggal = date('Y-m-d');
        $hadir_hari_ini = $hadir->gethadirWithGuruHariIni($tanggal);
        $total_poin = $hadir->getTotalPoinhadir();
        
        $data = [
            'title' => 'Data Guru dan Absensi',
            'hadir' => $hadir_hari_ini,
            'poin' => $total_poin
        ];
        return view('admin/data_hadir/index', $data);

    }

    public function show_alpa()
    {
        $alpa = new AlpaModel();
        $tanggal = date('Y-m-d');

        $data = [
            'title' => 'Data Guru Yang Alpa',
            'alpa' => $alpa->getAlpaWithGuru($tanggal),
            'poin' => $alpa->getTotalPoinAlpa()
        ];

        return view('admin/data_alpa/index', $data);
    }

    public function detailLokasi($id)
    {
        $kehadiranModel = new KehadiranModel();
        $dataHadir = $kehadiranModel->find($id); // Ambil data kehadiran berdasarkan ID

        if ($dataHadir) {
            $data = [
                'title' => 'Detail Lokasi',
                'latitude' => $dataHadir['latitude'],
                'longitude' => $dataHadir['longitude'],
            ];

            return view('admin/data_hadir/map', $data);
        } else {
            // Handle jika data tidak ditemukan, misalnya dengan redirect atau pesan error
            return redirect()->to('/admin/kehadiran')->with('error', 'Data tidak ditemukan.');
        }
    }
}