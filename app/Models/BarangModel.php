<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
  protected $table            = 'databarang';
  protected $primaryKey       = 'id';
  protected $returnType       = 'object';
  protected $allowedFields    = ['kode_brg', 'nama_brg', 'spesifikasi', 'thn_pembelian', 'kategori', 'kondisi_baik', 'kondisi_rusak', 'jml_akhir'];
  protected $useTimestamps    = true;
  protected $useSoftDeletes   = true;

  public function getAllBarang()
  {
    return $this->db->table('databarang')
      ->select('*')
      ->get()->getResultArray();
  }

  public function getDetailBarang($kode_brg)
  {
    $detailBarang = $this->db()->table('databarang')
      ->select('*')
      ->where('kode_brg', $kode_brg)
      ->get()->getResultArray();
    return $detailBarang[0];
  }

  public function updateBarangByKode($kode_brg, $data)
  {
    $this->db->table('databarang')
    ->where('kode_brg', $kode_brg)
    ->update($data);
  }
}
