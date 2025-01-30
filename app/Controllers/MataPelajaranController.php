<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MataPelajaranModel;
use CodeIgniter\HTTP\ResponseInterface;

class MataPelajaranController extends BaseController
{
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Mapel'
        ];
        return view('admin/data_mapel/create', $data);
    }
    public function aksi_tambah()
    {
        $mata_pelajaran = new MataPelajaranModel();
        $mata_pelajaran->insert([
            'nama_mata_pelajaran'=> $this->request->getPost('nama_mata_pelajaran')
        ]);
        return redirect()->to('/admin/datamapel')->with('success','Berhasil Create Data');
    }
    public function hapus($id)
    {
        $mata_pelajaran = new MataPelajaranModel();
        $mata_pelajaran->delete($id);
        return redirect()->to('/admin/datamapel')->with('succes','Berhasil Hapus Data');
    }
}
