<?php

namespace App\Models;

use CodeIgniter\Model;

class KehadiranModel extends Model
{
    protected $table            = 'kehadiran';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id_guru','tanggal','kode_qr','jam_masuk','jam_keluar','status','poin'];

    public function gethadirWithGuru($tanggal)
    {
        return $this->select('kehadiran.*, guru.nama_guru as nama_guru')
                    ->join('guru', 'guru.id = kehadiran.id_guru')
                    ->where('kehadiran.tanggal', $tanggal)
                    ->findAll();
    }

    public function getTotalPoinhadir()
    {
        return $this->select('id_guru, guru.nama_guru as nama_guru, SUM(poin) as total_poin')
                    ->join('guru', 'guru.id = kehadiran.id_guru')
                    ->groupBy('id_guru')
                    ->findAll();
    }

}
