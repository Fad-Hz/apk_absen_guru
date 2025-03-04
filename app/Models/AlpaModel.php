<?php

namespace App\Models;

use CodeIgniter\Model;

class AlpaModel extends Model
{
    protected $table            = 'alpa';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id_guru', 'tanggal', 'poin'];

    public function getAlpaWithGuru($tanggal)
    {
        return $this->select('alpa.*, guru.nama_guru as nama_guru')
            ->join('guru', 'guru.id = alpa.id_guru')
            ->where('alpa.tanggal', $tanggal)
            ->findAll();
    }

    public function getTotalPoinAlpa()
    {
        return $this->select('id_guru, guru.nama_guru as nama_guru, SUM(poin) as total_poin')
            ->join('guru', 'guru.id = alpa.id_guru')
            ->groupBy('id_guru')
            ->findAll();
    }

    public function getAlpaByGuruAndYear($nama_guru, $tahun)
    {
        return $this->select('alpa.tanggal, alpa.poin')
        ->join('guru', 'guru.id = alpa.id_guru')
        ->where('guru.nama_guru', $nama_guru)
            ->where('YEAR(alpa.tanggal)', $tahun)
            ->orderBy('alpa.tanggal', 'ASC') // Order by tanggal
            ->findAll();
    }

}
