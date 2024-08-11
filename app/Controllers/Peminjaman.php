<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PeminjamanModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class Peminjaman extends BaseController
{
  protected $peminjamanModel;
  protected $pager;

  function __construct()
  {
    $this->peminjamanModel = new PeminjamanModel();
    $this->pager = Services::pager();
  }

  public function indexAdmin()
  {
    $perPage = 10;
    $data = [
      'peminjaman' => $this->peminjamanModel->getAll($perPage),
    ];

    return view('admin/peminjaman/index', $data);
  }

  public function detail($id = null)
  {
    $detail_peminjaman = $this->peminjamanModel->getDetailPeminjaman($id);

    if ($detail_peminjaman) {
      return $this->response->setJSON($detail_peminjaman);
    } else {
      return $this->response->setJSON(['error' => 'No data found']);
    }
  }

  public function updateStatus()
  {
    $id = $this->request->getPost('id');
    $status = $this->request->getPost('status');

    $update = $this->peminjamanModel->updateStatus($id, $status);

    if ($update) {
      return redirect()->to('admin/peminjaman')->with('success', 'Status approval berhasil diubah');
    } else {
      return redirect()->to('admin/peminjaman')->with('error', 'Status approval gagal diubah');
    }
  }

  public function updatePengembalian()
  {
    $id = $this->request->getPost('id');

    $update = $this->peminjamanModel->updatePengembalian($id);

    if ($update) {
      return redirect()->to('admin/peminjaman')->with('success', 'Status pengembalian berhasil diubah');
    } else {
      return redirect()->to('admin/peminjaman')->with('error', 'Status pengembalian gagal diubah');
    }
  }
}
