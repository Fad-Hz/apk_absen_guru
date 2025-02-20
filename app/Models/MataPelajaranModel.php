<?php

namespace App\Models;

use CodeIgniter\Model;

class MataPelajaranModel extends Model
{
    protected $table            = 'mata_pelajaran';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_mapel','jp','harga_per_jp','angkatan','id_guru'];

    public function getMapelWithGuru()
    {
        return $this->select('mata_pelajaran.*, guru.nama_guru')
        ->join('guru', 'guru.id = mata_pelajaran.id_guru', 'left')
        ->findAll();
    }
    
}
