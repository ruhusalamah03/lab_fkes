<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\PrasatModel;

class Prasats extends BaseController
{
    protected $barangModel;
    protected $prasatModel;
    protected $helpers = ['user'];

    function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->prasatModel = new PrasatModel();
    }

    public function index()
    {
        $data['prasats'] = $this->prasatModel->getAll();

        if (session()->get('role') == 'admin') {
            return view('admin/prasat/index', $data);
        } elseif (session()->get('role') == 'user') {
            return view('user/prasat/index', $data);
        } else {
            return redirect()->to('/login');
        }
        // $data['prasats'] = $this->prasatModel->getAll();
        // return view('admin/prasat/index', $data);
    }

    public function KMB()
    {
        $kode_brg = 'KMB'; 
        $data['prasats'] = $this->prasatModel->getByKodeBrg($kode_brg);
        $data['barang'] = $this->barangModel->findAll();

        if (session()->get('role') == 'admin') {
            return view('admin/prasat/kmb', $data);
        } elseif (session()->get('role') == 'user') {
            return view('user/prasat/kmb', $data);
        } else {
            return redirect()->to('/login');
        }
        // $kode_brg = 'KMB'; // Set the code for KMB
        // $data['prasats'] = $this->prasatModel->getByKodeBrg($kode_brg);
        // $data['barang'] = $this->barangModel->findAll();
        // return view('admin/prasat/kmb', $data);
    }

    public function newKMB()
    {
        return view('/admin/prasat/kmb/new');
    }

    public function KA()
    {
        $kode_brg = 'KA'; 
        $data['prasats'] = $this->prasatModel->getByKodeBrg($kode_brg);
        $data['barang'] = $this->barangModel->findAll();

        if (session()->get('role') == 'admin') {
            return view('admin/prasat/ka', $data);
        } elseif (session()->get('role') == 'user') {
            return view('user/prasat/ka', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function KM()
    {
        $kode_brg = 'KM'; 
        $data['prasats'] = $this->prasatModel->getByKodeBrg($kode_brg);
        $data['barang'] = $this->barangModel->findAll();

        if (session()->get('role') == 'admin') {
            return view('admin/prasat/km', $data);
        } elseif (session()->get('role') == 'user') {
            return view('user/prasat/km', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function KGD()
    {
        $kode_brg = 'KGD'; // Set the code for KMB
        $data['prasats'] = $this->prasatModel->getByKodeBrg($kode_brg);
        $data['barang'] = $this->barangModel->findAll();

        if (session()->get('role') == 'admin') {
            return view('admin/prasat/kgd', $data);
        } elseif (session()->get('role') == 'user') {
            return view('user/prasat/kgd', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function KJ()
    {
        $kode_brg = 'KJ'; // Set the code for KMB
        $data['prasats'] = $this->prasatModel->getByKodeBrg($kode_brg);
        $data['barang'] = $this->barangModel->findAll();

        if (session()->get('role') == 'admin') {
            return view('admin/prasat/kj', $data);
        } elseif (session()->get('role') == 'user') {
            return view('user/prasat/kj', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function KG()
    {
        $kode_brg = 'KG'; // Set the code for KMB
        $data['prasats'] = $this->prasatModel->getByKodeBrg($kode_brg);
        $data['barang'] = $this->barangModel->findAll();

        if (session()->get('role') == 'admin') {
            return view('admin/prasat/kg', $data);
        } elseif (session()->get('role') == 'user') {
            return view('user/prasat/kg', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function KKOM()
    {
        $kode_brg = 'KKOM'; // Set the code for KMB
        $data['prasats'] = $this->prasatModel->getByKodeBrg($kode_brg);
        $data['barang'] = $this->barangModel->findAll();

        if (session()->get('role') == 'admin') {
            return view('admin/prasat/kkom', $data);
        } elseif (session()->get('role') == 'user') {
            return view('user/prasat/kkom', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function KD()
    {
        $kode_brg = 'KD'; // Set the code for KMB
        $data['prasats'] = $this->prasatModel->getByKodeBrg($kode_brg);
        $data['barang'] = $this->barangModel->findAll();

        if (session()->get('role') == 'admin') {
            return view('admin/prasat/kd', $data);
        } elseif (session()->get('role') == 'user') {
            return view('user/prasat/kd', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function IBD()
    {
        $kode_brg = 'IBD'; // Set the code for KMB
        $data['prasats'] = $this->prasatModel->getByKodeBrg($kode_brg);
        $data['barang'] = $this->barangModel->findAll();

        if (session()->get('role') == 'admin') {
            return view('admin/prasat/ibd', $data);
        } elseif (session()->get('role') == 'user') {
            return view('user/prasat/ibd', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function newIBD()
    {
        return view('prasat/ibd/new');
    }

    public function createIBD()
    {
        $data['barang'] = $this->barangModel->findAll();
        return view('prasat/ibd/create');
    }

    public function store()
    {
        $data = [
            'kode_brg' => $this->request->getPost('kode_brg'),
            'nama_brg' => $this->request->getPost('nama_brg'),
            'spesifikasi' => $this->request->getPost('spesifikasi'),
            'thn_pembelian' => $this->request->getPost('thn_pembelian'),
            'kategori' => $this->request->getPost('kategori'),
            'kondisi_baik' => $this->request->getPost('kondisi_baik'),
            'kondisi_rusak' => $this->request->getPost('kondisi_rusak'),
            'jml_akhir' => $this->request->getPost('jml_akhir'),
        ];

        if ($this->prasatModel->insert($data) === false) {
            log_message('error', 'Insert failed: ' . print_r($this->prasatModel->errors(), true));
            return redirect()->back()->with('error', 'Gagal Menambah.');
        }

        $category = $this->request->getPost('kategori');
        if ($category == 'IBD') {
            return redirect()->to('/prasat/IBD')->with('success', 'Data barang berhasil ditambahkan');
        } elseif ($category == 'KMB') {
            return redirect()->to('/prasat/KMB')->with('success', 'Data barang berhasil ditambahkan');
        } elseif ($category == 'KA') {
            return redirect()->to('/prasat/KA')->with('success', 'Data barang berhasil ditambahkan');
        } elseif ($category == 'KM') {
            return redirect()->to('/prasat/KM')->with('success', 'Data barang berhasil ditambahkan');
        } elseif ($category == 'KGD') {
            return redirect()->to('/prasat/KGD')->with('success', 'Data barang berhasil ditambahkan');
        } elseif ($category == 'KJ') {
            return redirect()->to('/prasat/KJ')->with('success', 'Data barang berhasil ditambahkan');
        } elseif ($category == 'KG') {
            return redirect()->to('/prasat/KG')->with('success', 'Data barang berhasil ditambahkan');
        } elseif ($category == 'KKOM') {
            return redirect()->to('/prasat/KKOM')->with('success', 'Data barang berhasil ditambahkan');
        } elseif ($category == 'KD') {
            return redirect()->to('/prasat/KD')->with('success', 'Data barang berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Kategori Salah');
        }
    }
}
