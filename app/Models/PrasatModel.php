<?php

namespace App\Models;

use CodeIgniter\Model;

class PrasatModel extends Model
{
  protected $table            = 'prasat';
  protected $primaryKey       = 'id_prasat';
  protected $returnType       = 'object';
  protected $allowedFields    = ['kode_brg', 'matkul'];
  protected $useTimestamps    = true;
  protected $useSoftDeletes   = true;

  public function getByKodeBrg($kode_brg)
  {
    return $this->where('kode_brg', $kode_brg)->findAll();
  }

  public function getPrasatByMatkul($matkul)
  {
    $dataPrasat = $this->db->table('prasat')
      ->select('id_prasat,kode_brg,created_at,updated_at')
      ->where('matkul', $matkul)
      ->get()->getResultArray();

    foreach ($dataPrasat as $key => $value) {
      $detailBarang = $this->db->table('databarang')
        ->select('nama_brg,spesifikasi,thn_pembelian,kategori,kondisi_baik,kondisi_rusak,jml_akhir')
        ->where('kode_brg', $value['kode_brg'])
        ->get()->getResultArray();

      // merge into one array
      $dataPrasat[$key] = array_merge($dataPrasat[$key], $detailBarang[0]);
    }


    return $dataPrasat;
  }
  

  public function getKMB()
  {
    $dataPrasat = $this->db->table('prasat')
      ->select('id_prasat,kode_brg,created_at,updated_at')
      ->where('matkul', 'KMB')
      ->get()->getResultArray();

    foreach ($dataPrasat as $key => $value) {
      $detailBarang = $this->db->table('databarang')
        ->select('nama_brg,spesifikasi,thn_pembelian,kategori,kondisi_baik,kondisi_rusak,jml_akhir')
        ->where('kode_brg', $value['kode_brg'])
        ->get()->getResultArray();

      // merge into one array
      $dataPrasat[$key] = array_merge($dataPrasat[$key], $detailBarang[0]);
    }

    return $dataPrasat;
  }

  function getAll()
  {
    $builder = $this->db->table('prasat');
    $builder->join('databarang', 'databarang.kode_brg = prasat.kode_brg');
    $query = $builder->get();
    return $query->getResult();
  }

  public function insertPrasat($data)
  {
    return $this->insert($data);
  }

  public function deletePrasat($id)
  {
    $this->db->table('prasat')
      ->where('id_prasat', $id)
      ->delete();
  }
}
