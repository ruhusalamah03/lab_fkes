<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PeminjamanBarangModel;
use App\Models\BarangModel;
use App\Models\ManajemenuserModel;

class PeminjamanBarang extends BaseController
{
    protected $peminjamanbarangModel;
    protected $barangModel;
    protected $manajemenuserModel;

    public function __construct()
    {
        $this->peminjamanbarangModel = new PeminjamanBarangModel();
        $this->barangModel = new BarangModel();
        $this->manajemenuserModel = new ManajemenuserModel();
    }

    public function indexAdmin()
    {
        $data['peminjamanbarang'] = $this->peminjamanbarangModel->findAll();
        return view('admin/peminjaman/index', $data);
    }

    public function indexUser()
    {
        $userId = session()->get('id_user');
        $data['peminjamanbarang'] = $this->peminjamanbarangModel->where('userId', $userId)->findAll();
        return view('user/peminjamanbarang/index');
    }

    public function pinjam()
    {
        if ($this->request->getMethod() === 'post') {
            $userId = session()->get('id_user');
            $barangIds = $this->request->getPost('barangId');

            foreach ($barangIds as $barangId) {
                $this->peminjamanbarangModel->insert([
                    'userId' => $userId,
                    'barangId' => $barangId,
                    'status' => 'pending',
                    'isDikembalikan' => false,
                ]);
            }
            return redirect()->to('/user/peminjamanbarang');
        }

        $data['barang'] = $this->barangModel->findAll();
        return view('user/peminjaman/pinjam', $data);
    }

    public function validasi($id)
    {
        if($this->request->getMethod() === 'post'){
            $status = $this->request->getPost('status');

            $this->peminjamanbarangModel->update($id, [
                'status' => $status,
            ]);
            return redirect()->to('/admin/peminjaman');
        }

        $data['peminjamanbarang'] = $this->peminjamanbarangModel->find($id);
        return view('admin/peminjaman/validasi', $data);
    }

    public function kembalikan($id)
    {
        $userId = session()->get('id_user');
        $peminjamanbarang = $this->peminjamanbarangModel->where('id', $id)->where('userId', $userId)->first();

        if ($peminjamanbarang && $peminjamanbarang['status'] === 'accept') {
            $this->peminjamanbarangModel->update($id, [
                'isDikembalikan' => true,
            ]);
            return redirect()->to('/user/peminjamanbarang');
        } else {
            return redirect()->to('/user/peminjamanbarang')->with('error', 'Barang belum di setujui oleh admin atau Anda tidak berhak mengembalikkan barang ini');
        }
    }
}

