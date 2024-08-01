<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
   
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
        $userModel = new \App\Models\UserModel();
        $data['data_user'] = $userModel->findAll();
    
        return view('admin/manajemenuser', $data);
    }

    public function riwayatpeminjaman(){
        $data = [
            'title' => 'labfkes',
        ];

        return view('admin/riwayatpeminjaman', $data);
    }

    public function profile(){
        $data = [
            'title' => 'labfkes',
        ];

        return view('admin/profile', $data);
    }
}
