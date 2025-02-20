<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KehadiranModel;

class Persentase extends BaseController
{
    public function index()
    {
        $kehadiranModel = new KehadiranModel();
        $bulan = $this->request->getGet('bulan') ?? date('m');
        $tahun = $this->request->getGet('tahun') ?? date('Y');

        $data['kehadiran'] = $kehadiranModel->getKehadiranGuruByBulanTahun($bulan, $tahun);
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['title'] = 'Persentase Kehadiran Guru';

        return view('admin/persentase_kehadiran/index', $data);
    }
}
