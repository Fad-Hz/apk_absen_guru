<?php

namespace App\Models;

use CodeIgniter\Model;

class IJinModel extends Model
{
    protected $table            = 'ijin';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['tanggal','id_guru','keterangan','poin'];

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

}
