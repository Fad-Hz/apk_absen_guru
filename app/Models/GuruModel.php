<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table            = 'guru';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_guru','mata_pelajaran_id','status','foto_guru'];

    public function getGuruWithMapel($id = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('guru.*,mata_pelajaran.nama_mata_pelajaran');
        $builder->join('mata_pelajaran','mata_pelajaran.id = guru.mata_pelajaran_id','left');
        
        if($id !== null) {
            $builder->where('guru.id', $id);
            return $builder->get()->getRowArray();
        }
        return $builder->get()->getResultArray();
    }

    public function resetStatus()
    {
        $this->db->table($this->table)
            ->set('status', 'belum absen')
            ->update();
    }

}
