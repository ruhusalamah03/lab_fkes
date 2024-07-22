<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table            = 'databarang';
    protected $primaryKey       = 'id';
    // protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['kode_brg', 'nama_brg', 'spesifikasi', 'thn_pembelian', 'kategori', 'kondisi_baik', 'kondisi_rusak', 'jml_akhir'];
    protected $useTimestamps    = true;
}
