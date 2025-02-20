<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggajianModel extends Model
{
    protected $table = 'penggajian';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_guru', 'total_gaji', 'pengurangan_gaji','sisa_gaji','tanggal_gaji'];

    public function hitungGajiHarian($id_guru, $tanggal)
    {
        $db = \Config\Database::connect();
        $query = $db->query("
        SELECT SUM(mata_pelajaran.jp * mata_pelajaran.harga_per_jp) AS total_gaji
        FROM mata_pelajaran
        WHERE mata_pelajaran.id_guru = ? 
    ",
            [$id_guru]
        );

        $result = $query->getRowArray();

        return $result['total_gaji'] ?? 0;
    }
    public function getGajiWithGuru()
    {
        return $this->select('penggajian.*, guru.nama_guru')
        ->join('guru', 'guru.id = penggajian.id_guru', 'left')
        ->findAll();
    }
}
