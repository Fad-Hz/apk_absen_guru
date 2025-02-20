<?php

namespace App\Controllers;

use App\Models\MataPelajaranModel;
use App\Models\PenggajianModel;

class PenggajianController extends BaseController
{
    public function index()
    {
        $id_guru = session()->get('id_guru');
        $bulan = $this->request->getGet('bulan') ?? date('m');
        $tahun = $this->request->getGet('tahun') ?? date('Y');
        $penggajianModel = new PenggajianModel();

        // Query data penggajian berdasarkan id_guru, bulan, dan tahun
        $gaji = $penggajianModel->where('id_guru', $id_guru)
            ->where('MONTH(tanggal_gaji)', $bulan)
            ->where('YEAR(tanggal_gaji)', $tahun)
            ->findAll();

        $data = [
            'title' => 'Data Gaji',
            'gaji' => $gaji,
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];

        return view('user/lihat_gaji', $data);
    }

    public function mapel()
    {
        $id_guru = session()->get('id_guru'); // Ambil ID guru dari session
        $mataPelajaranModel = new MataPelajaranModel();

        $data = [
            'title' => 'Mata Pelajaran Saya',
            'mapel' => $mataPelajaranModel->where('id_guru', $id_guru)->findAll() // Ambil data berdasarkan id_guru
        ];

        return view('user/my_mapel', $data);
    }
}
