<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PeminjamanModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class Admin extends BaseController
{
    protected $peminjamanModel;
    protected $pager;

    function __construct()
    {
        $this->peminjamanModel = new PeminjamanModel();
        $this->pager = Services::pager();
    }

    public function index()
    {
        $data = [
            'title' => 'labfkes',
        ];

        return view('admin/body', $data);
    }

    // public function labfkes(){
    //     $data = [
    //         'title' => 'labfkes',
    //         ];

    //     return view('admin/body', $data);
    // }

    public function manajemenuser()
    {
        $manajemenuser = new \App\Models\ManajemenuserModel();
        $data['data_user'] = $manajemenuser->findAll();

        return view('admin/manajemenuser', $data);
    }

    public function riwayatpeminjaman()
    {
        $perPage = 10;
        $data = [
            'riwayat' => $this->peminjamanModel->getAllRiwayat($perPage),
        ];

        return view('admin/riwayatpeminjaman', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'labfkes',
        ];

        return view('admin/profile', $data);
    }
}
