<?php

namespace App\Models;

use CodeIgniter\Model;

class KehadiranModel extends Model
{
  protected $table            = 'kehadiran';
  protected $primaryKey       = 'id';
  protected $allowedFields    = ['id_guru', 'tanggal', 'kode_qr', 'jam_masuk', 'jam_keluar', 'status', 'poin', 'latitude', 'longitude'];

  public function gethadirWithGuruHariIni($tanggal)
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
  public function getKehadiranByGuruAndYear($nama_guru, $tahun)
  {
    return $this->select('kehadiran.tanggal, kehadiran.jam_masuk, kehadiran.jam_keluar, kehadiran.status, kehadiran.poin')
      ->join('guru', 'guru.id = kehadiran.id_guru')
      ->where('guru.nama_guru', $nama_guru)
      ->where('YEAR(kehadiran.tanggal)', $tahun)
      ->orderBy('kehadiran.tanggal', 'ASC') // Order by tanggal
      ->findAll();
  }
  public function getKehadiranGuruByBulanTahun($bulan, $tahun)
  {
    return $this->select('id_guru, guru.nama_guru, SUM(poin) as total_poin, COUNT(tanggal) as jumlah_hari')
      ->join('guru', 'kehadiran.id_guru = guru.id')
      ->where('MONTH(tanggal)', $bulan)
      ->where('YEAR(tanggal)', $tahun)
      ->groupBy('id_guru, guru.nama_guru')
      ->findAll();
  }
}
