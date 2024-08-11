<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\PeminjamanModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class User extends BaseController
{
    protected $peminjamanModel;
    protected $barangModel;
    protected $pager;
    protected $auth;

    function __construct()
    {
        $this->peminjamanModel = new PeminjamanModel();
        $this->barangModel = new BarangModel();
        $this->pager = Services::pager();
        $this->auth = new Auth();
    }
    
    public function index(): string
    {
        $data = [
            'title' => 'Beranda',
        ];

        return view('user/template/beranda', $data);
    }

    public function peminjaman()
    {
        $perPage = 10;
        $nim = session()->get('nim');
        $data = [
            'peminjaman' => $this->peminjamanModel->getAllByNim($nim, $perPage),
            'databarang' => $this->barangModel->getAvailableBarang(),
        ];

        return view('user/peminjaman/index', $data);
    }

    public function store()
    {
        $nim = session()->get('nim');
        $barang = $this->request->getPost('kode_brg');
        $tgl_pinjam = $this->request->getPost('tgl_pinjam');
        $tgl_kembali = $this->request->getPost('tgl_kembali');
        $catatan = $this->request->getPost('catatan');

        $data = [
            'nim' => $nim,
            'kode_brg' => $barang,
            'tgl_pinjam' => $tgl_pinjam,
            'tgl_kembali' => $tgl_kembali,
            'catatan' => $catatan,
        ];

        $mutate = $this->peminjamanModel->store($data);

        if ($mutate) {
            return redirect()->to('/user/peminjaman')->with('success', 'Peminjaman berhasil diajukan');
        } else {
            return redirect()->to('/user/peminjaman')->with('error', 'Peminjaman gagal diajukan');
        }
    }

    public function getUserDetailPeminjaman($id = null)
    {
        $nim = session()->get('nim');
        $detail_peminjaman = $this->peminjamanModel->getUserDetailPeminjaman($nim, $id);

        if ($detail_peminjaman) {
            return $this->response->setJSON($detail_peminjaman);
        } else {
            return $this->response->setJSON(['error' => 'No data found']);
        }
    }

    public function updateData($id = null)
    {
      $nim = session()->get('nim');
      $barang = $this->request->getPost('kode_brg');
      $tgl_pinjam = $this->request->getPost('tgl_pinjam');
      $tgl_kembali = $this->request->getPost('tgl_kembali');
      $catatan = $this->request->getPost('catatan');
  
      $data = [
        'nim' => $nim,
        'kode_brg' => $barang,
        'tgl_pinjam' => $tgl_pinjam,
        'tgl_kembali' => $tgl_kembali,
        'catatan' => $catatan,
      ];
  
      $mutate = $this->peminjamanModel->updateData($nim, $id, $data);
  
      if ($mutate) {
        return redirect()->to('/user/peminjaman')->with('success', 'Data peminjaman berhasil diubah');
      } else {
        return redirect()->to('/user/peminjaman')->with('error', 'Data peminjaman gagal diubah');
      }
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

    public function informasi(){
        $data = [
            'title' => 'labfkes',
        ];

        return view('user/informasi', $data);
    }
}
