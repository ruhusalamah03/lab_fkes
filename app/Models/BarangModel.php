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
}
