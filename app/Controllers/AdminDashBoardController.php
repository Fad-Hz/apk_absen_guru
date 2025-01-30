<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlpaModel;
use App\Models\GuruModel;
use App\Models\IJinModel;
use App\Models\KehadiranModel;
use App\Models\MataPelajaranModel;
use App\Models\ScanQrModel;
use CodeIgniter\I18n\Time;

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
        if (session()->get('role') != 'admin') {
             return redirect()->to('/')->with('error','Halaman tersebut hanya milik admin!');
         }
        $mata_pelajaran = new MataPelajaranModel();

        $data = [
            'title' => 'Data Mata Pelajaran',
            'mata_pelajaran' => $mata_pelajaran->findAll()
        ];
        return view('admin/data_mapel/index', $data);
    }
    public function show_scan()
    {
        $scan_qr = new ScanQrModel();
        $today = Time::now('Asia/Jakarta')->toDateString();
        $scan_qr->where('tanggal', $today)->first();
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
            'guru' => $guru_model->getGuruWithMapel()
        ];
        return view('admin/data_guru/index', $data);
    }
    
    public function show_ijin()
    {
        if (!session()->get('role') !== 'admin') {
             return redirect()->to('/')->with('adm_err','er');
         }
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
        $hadir = new KehadiranModel();
        $tanggal = date('Y-m-d');
        $hadir_hari_ini = $hadir->gethadirWithGuru($tanggal);
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
}
