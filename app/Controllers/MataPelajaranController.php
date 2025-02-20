<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuruModel;
use App\Models\MataPelajaranModel;
use CodeIgniter\HTTP\ResponseInterface;

class MataPelajaranController extends BaseController
{
    protected $mataPelajaranModel;
    protected $guruModel;

    public function __construct()
    {
        $this->mataPelajaranModel = new MataPelajaranModel();
        $this->guruModel = new GuruModel();
    }

    // Menampilkan form tambah data
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Mapel',
            'guru' => $this->guruModel->findAll()
        ];
        return view('admin/data_mapel/create', $data);
    }

    // Menyimpan data baru ke database
    public function aksi_tambah()
    {
        $this->mataPelajaranModel->insert([
            'nama_mapel'    => $this->request->getPost('nama_mapel'),
            'jp'            => $this->request->getPost('jp'),
            'harga_per_jp'  => $this->request->getPost('harga_per_jp'),
            'angkatan'      => $this->request->getPost('angkatan'),
            'id_guru'       => $this->request->getPost('id_guru')
        ]);

        return redirect()->to('/admin/datamapel')->with('success', 'Berhasil menambahkan data');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Mata Pelajaran',
            'mapel' => $this->mataPelajaranModel->find($id),
            'guru' => $this->guruModel->findAll()
        ];

        if (!$data['mapel']) {
            return redirect()->to('/admin/datamapel')->with('error', 'Data tidak ditemukan');
        }

        return view('admin/data_mapel/edit', $data);
    }

    // Memproses perubahan data
    public function aksi_edit($id)
    {
        $this->mataPelajaranModel->update($id, [
            'nama_mapel'    => $this->request->getPost('nama_mapel'),
            'jp'            => $this->request->getPost('jp'),
            'harga_per_jp'  => $this->request->getPost('harga_per_jp'),
            'angkatan'      => $this->request->getPost('angkatan'),
            'id_guru'       => $this->request->getPost('id_guru')
        ]);

        return redirect()->to('/admin/datamapel')->with('success', 'Data berhasil diperbarui');
    }

    // Hapus data mata pelajaran
    public function hapus($id)
    {
        $this->mataPelajaranModel->delete($id);
        return redirect()->to('/admin/datamapel')->with('success', 'Berhasil menghapus data');
    }
}
