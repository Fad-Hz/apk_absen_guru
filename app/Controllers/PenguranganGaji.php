<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MataPelajaranModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PenggajianModel;

class PenguranganGaji extends BaseController
{
    public function index()
    {
        $penggajianModel = new PenggajianModel();
        $data['gaji'] = $penggajianModel->getGajiWithGuru(); // Ambil semua data penggajian

        return view('admin/pengurangan_gaji/index', $data);
    }

    public function kurangi($id)
    {
        $penggajianModel = new PenggajianModel();
        $mapelModel = new MataPelajaranModel();

        $gaji = $penggajianModel->select('penggajian.*, guru.nama_guru') // Tambahkan nama_guru dari tabel guru
        ->join('guru', 'penggajian.id_guru = guru.id')
        ->find($id);

        $id_guru = $gaji['id_guru'];
        $mapel = $mapelModel->where('id_guru', $id_guru)->findAll(); // Ambil mapel berdasarkan id_guru

        $data = [
            'gaji' => $gaji,
            'mapel' => $mapel
        ];

        return view('admin/pengurangan_gaji/edit', $data);
    }

    public function prosesKurangi($id)
    {
        $penggajianModel = new PenggajianModel();

        $jumlah_pengurangan = $this->request->getPost('jumlah_pengurangan');

        // Update data penggajian
        $data['gaji'] = $penggajianModel->find($id);
        $sisa_gaji = $data['gaji']['sisa_gaji'] - $jumlah_pengurangan;

        $penggajianModel->update($id, [
            'pengurangan_gaji' => $data['gaji']['pengurangan_gaji'] + $jumlah_pengurangan,
            'sisa_gaji' => $sisa_gaji,
        ]);

        return redirect()->to('/admin/datagaji')->with('success', 'Pengurangan gaji berhasil.');
    }
}
