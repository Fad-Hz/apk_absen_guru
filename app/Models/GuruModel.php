<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table            = 'guru';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_guru','status','jam_masuk','jam_keluar'];

    public function resetStatus()
    {
        $this->db->table($this->table)
            ->set('status', 'belum absen')
            ->update();
    }

}
