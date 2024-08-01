<?php

namespace App\Models;

use CodeIgniter\Model;

class PrasatModel extends Model
{
    protected $table            = 'prasat';
    protected $primaryKey       = 'id_prasat';
    protected $returnType       = 'object';
    protected $allowedFields    = ['kode_brg', 'nama_brg', 'spesifikasi', 'thn_pembelian', 'kategori', 'kondisi_baik', 'kondisi_rusak', 'jml_akhir'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;

    public function getByKodeBrg($kode_brg)
    {
        return $this->where('kode_brg', $kode_brg)->findAll();
    }

    public function getIBD()
    {
        return $this->where('kode_brg', 'IBD')->findAll();
        // return $this->db->table('prasat')
        //                 ->select('*')
        //                 ->get()->getResultArray();  
    }

    public function getKMB()
    {
        return $this->where('kode_brg', 'KMB')->findAll();
    }

    public function getKA()
    {
        return $this->where('kode_brg', 'KA')->findAll();
    }
    
    public function getKM()
    {
        return $this->where('kode_brg', 'KM')->findAll();
    }

    public function getKGD()
    {
        return $this->where('kode_brg', 'KGD')->findAll();
    }

    public function getKJ()
    {
        return $this->where('kode_brg', 'KJ')->findAll();
    }

    public function getKG()
    {
        return $this->where('kode_brg', 'KG')->findAll();
    }

    public function getKKOM()
    {
        return $this->where('kode_brg', 'KKOM')->findAll();
    }

    public function getKD()
    {
        return $this->where('kode_brg', 'KD')->findAll();
    }

    function getAll(){
        $builder = $this->db->table('prasat');
        $builder->join('databarang', 'databarang.kode_brg = prasat.kode_brg');
        $query = $builder->get();
        return $query->getResult();
    }

}
