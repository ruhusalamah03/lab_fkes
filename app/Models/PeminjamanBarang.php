<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanBarangModel extends Model
{
    protected $table            = 'peminjamanbarang';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['userId', 'barangId', 'status', 'isDikembalikan'];
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;

    public function getAllPeminjamanBarang()
    {
        return $this->findAll();
    }

    public function getPeminjamanByUser($userId)
    {
        return $this->when('userId', $userId)->findAll();
    }
}
