<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ManajemenuserModel;
use CodeIgniter\HTTP\ResponseInterface;

class ManajemenUser extends BaseController
{
    protected $manajemenuserModel;

    public function __construct()
    {
        $this->manajemenuserModel = new ManajemenuserModel();
    }

    public function index()
    {
        $data = [
            'data_user' => $this->manajemenuserModel->findAll(),
            'i' => 1
        ];

        return view('admin/manajemenuser', $data);
    }

    public function store()
    {
        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash((string) $this->request->getPost('password'), PASSWORD_BCRYPT),
        ];

        $this->manajemenuserModel->insert($data);

        session()->setFlashdata('success', 'Data user berhasil ditambahkan');
        return redirect()->to(base_url('admin/manajemenuser'));
    }

    public function update($id)
    {
        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
        ];

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash((string) $this->request->getPost('password'), PASSWORD_BCRYPT);
        }
    
        $this->manajemenuserModel->update($id, $data);
    
        session()->setFlashdata('success', 'Data user berhasil diubah.');
        return redirect()->to(base_url('admin/manajemenuser'));
    }

    public function delete($id)
    {
        $this->manajemenuserModel->delete($id);

        session()->setFlashdata('success', 'Data user berhasil dihapus.');
        return redirect()->to(base_url('admin/manajemenuser'));
    }

    public function getData($id)
    {
        $data = $this->manajemenuserModel->find($id);
        return $this->response->setJSON($data);
    }
}
