<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlpaModel;
use App\Models\GuruModel;
use CodeIgniter\HTTP\ResponseInterface;

class AlpaController extends BaseController
{
    protected $guru;
    protected $alpa;

    public function __construct()
    {
        $this->guru = new GuruModel();
        $this->alpa = new AlpaModel();
    }

    public function set_alpa()
    {
        $tanggal = date('Y-m-d');
        $guru_belum_absen = $this->guru->where('status', 'belum absen')->findAll();

        if(!empty($guru_belum_absen)) {
            foreach($guru_belum_absen as $g) {
                $this->alpa->insert([
                    'id_guru' => $g['id'],
                    'tanggal' => $tanggal,
                    'poin' => 1
                ]);
                $this->guru->update($g['id'], ['status' => 'alpa']);
            }
            return redirect()->to('/admin/dataalpa')->with('success', 'semua guru yang alpa berhasil di generate!');
        }
        return redirect()->to('/admin/dataalpa')->with('error', 'tidak ada guru yang alpa hari ini!');
    }
}
