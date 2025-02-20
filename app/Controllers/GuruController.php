<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuruModel;

class GuruController extends BaseController
{
    protected $guru_model;
    public function __construct()
    {
        $this->guru_model = new GuruModel();
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Guru',
        ];
        return view('admin/data_guru/tambah', $data);
    }
    public function aksi_tambah()
    {
        $data = [
            'nama_guru' => $this->request->getPost('nama_guru'),
            'jam_masuk' => $this->request->getPost('jam_masuk'),
            'jam_keluar' => $this->request->getPost('jam_keluar'),
            'status' => $this->request->getPost('status'),
        ];
        $this->guru_model->save($data);
        return redirect()->to('/admin/dataguru')->with('success', 'Berhasil tambah data');
    }
    public function edit($id)
    {
        $guru = $this->guru_model->find($id);
        $data = [
            'title' => 'Edit data Guru',
            'guru' => $guru,
        ];

        return view('admin/data_guru/edit', $data);
    }
    public function aksi_edit($id)
    {
    
        $data = [
            'nama_guru' => $this->request->getPost('nama_guru'),
            'status' => $this->request->getPost('status'),
            'jam_masuk' => $this->request->getPost('jam_masuk'),
            'jam_keluar' => $this->request->getPost('jam_keluar'),
        ];

        $this->guru_model->update($id, $data);
        return redirect()->to('/admin/dataguru')->with('success', 'Berhasil edit data');
    }
    public function hapus($id)
    {
        $this->guru_model->delete($id);
        return redirect()->to('/admin/dataguru')->with('success', 'Berhasil hapus data');
    }
}
