<?php

namespace App\Models;

use CodeIgniter\Model;

class PrasatModel extends Model
{
    protected $table            = 'prasat';
    protected $primaryKey       = 'id_prasat';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama_brg', 'spesifikasi', 'thn_pembelian', 'kategori', 'kondisi_baik', 'kondisi_rusak', 'jml_akhir', 'id'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;

    public function getIBD()
    {
        return $this->db->table('prasat')
                        ->select('*')
                        ->get()->getResultArray();  
    }
    
    function getAll(){
        $builder = $this->db->table('prasat');
        $builder->join('databarang', 'databarang.id = prasat.id_prasat');
        $query = $builder->get();
        return $query->getResult();
    }

}
