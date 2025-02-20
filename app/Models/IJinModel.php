<?php

namespace App\Models;

use CodeIgniter\Model;

class IjinModel extends Model
{
    protected $table            = 'ijin';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['tanggal', 'id_guru', 'jam_ijin', 'keterangan', 'poin'];

    public function getIjinWithGuru($tanggal)
    {
        return $this->select('ijin.*, guru.nama_guru as nama_guru')
            ->join('guru', 'guru.id = ijin.id_guru')
            ->where('ijin.tanggal', $tanggal)
            ->findAll();
    }

    public function getTotalPoinIjin()
    {
        return $this->select('id_guru, guru.nama_guru as nama_guru, SUM(poin) as total_poin')
            ->join('guru', 'guru.id = ijin.id_guru')
            ->groupBy('id_guru')
            ->findAll();
    }

    public function getIjinByGuruAndYear($nama_guru, $tahun)
    {
        return $this->select('ijin.tanggal, ijin.poin')
        ->join('guru', 'guru.id = ijin.id_guru')
        ->where('guru.nama_guru', $nama_guru)
            ->where('YEAR(ijin.tanggal)', $tahun)
            ->orderBy('ijin.tanggal', 'ASC') // Order by tanggal
            ->findAll();
    }
}
