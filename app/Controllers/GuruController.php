<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuruModel;
use App\Models\MataPelajaranModel;
use CodeIgniter\HTTP\ResponseInterface;

class GuruController extends BaseController
{
    protected $guru_model;
    public function __construct()
    {
        $this->guru_model = new GuruModel();
    }
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Data Guru',
            'guru' => $this->guru_model->getGuruWithMapel($id)
        ];
        return view('admin/data_guru/detail', $data);
    }
    public function tambah()
    {
        $mata_pelajaran = new MataPelajaranModel();
        $data = [
            'title' => 'Tambah Data Guru',
            'mapel' => $mata_pelajaran->findAll()
        ];
        return view('admin/data_guru/tambah', $data);
    }
    public function aksi_tambah()
    {
        $foto_guru = $this->request->getFile('foto_guru');
        $nama_foto = $foto_guru && $foto_guru->isValid() ? $foto_guru->getRandomName() : null;

        if ($nama_foto) {
            $foto_guru->move('uploads', $nama_foto);
        }

        $data = [
            'nama_guru' => $this->request->getPost('nama_guru'),
            'mata_pelajaran_id' => $this->request->getPost('mata_pelajaran'),
            'status' => $this->request->getPost('status'),
            'foto_guru' => $nama_foto
        ];
        $this->guru_model->save($data);
        return redirect()->to('/admin/dataguru');
    }
    public function edit($id)
    {
        $mata_pelajaran = new MataPelajaranModel();
        $guru = $this->guru_model->getGuruWithMapel($id);
        $mapel = $mata_pelajaran->findAll();

        $data = [
            'title' => 'Edit data Guru',
            'guru' => $guru,
            'mapel' => $mapel
        ];

        return view('admin/data_guru/edit', $data);
    }
    public function aksi_edit($id)
    {
        $foto_guru = $this->request->getFile('foto_guru');
        $nama_foto = $foto_guru && $foto_guru->isValid() ? $foto_guru->getRandomName() : null;

        if ($nama_foto) {
            $foto_guru->move('uploads', $nama_foto);
        }

        $data = [
            'nama_guru' => $this->request->getPost('nama_guru'),
            'status' => $this->request->getPost('status'),
            'mata_pelajaran_id' => $this->request->getPost('mata_pelajaran'),
            'foto_guru' => $nama_foto
        ];

        $this->guru_model->update($id, $data);
        return redirect()->to('/admin/dataguru');
    }
    public function hapus($id)
    {
        $this->guru_model->delete($id);
        return redirect()->to('/admin/dataguru');
    }
}
