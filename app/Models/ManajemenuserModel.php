<?php

namespace App\Models;


use CodeIgniter\Model;

class ManajemenuserModel extends Model
{
    protected $table = 'manajemen_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nim', 'nama_user', 'email', 'password'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;
}
