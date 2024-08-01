<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Beranda',
        ];

        return view('user/template/beranda', $data);
    }

    public function riwayatpeminjaman(){
        $data = [
            'title' => 'labfkes',
        ];

        return view('riwayatpeminjaman', $data);
    }

    public function peminjaman(){
        $data = [
            'title' => 'labfkes',
        ];

        return view('user/layanan/peminjamanbarang', $data);
    }

    public function kontak(){
        $data = [
            'title' => 'labfkes',
        ];

        return view('user/kontak', $data);
    }

    public function profile(){
        $data = [
            'title' => 'labfkes',
        ];

        return view('user/profile', $data);
    }
}
