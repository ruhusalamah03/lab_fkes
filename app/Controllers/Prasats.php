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
  }

  public function KMB()
  {
    $matkul = 'KMB';
  
    $data['prasats'] = $this->prasatModel->getPrasatByMatkul($matkul);
    $data['barang'] = $this->barangModel->getAllBarang();


    if (session()->get('role') == 'admin') {
      return view('admin/prasat/kmb', $data);
    } elseif (session()->get('role') == 'user') {
      return view('user/prasat/kmb', $data);
    } else {
      return redirect()->to('/login');
    }
  }

  public function KA()
  {
    $matkul = 'KA';

    $data['prasats'] = $this->prasatModel->getPrasatByMatkul($matkul);
    $data['barang'] = $this->barangModel->getAllBarang();

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
    $matkul = 'KM';

    $data['prasats'] = $this->prasatModel->getPrasatByMatkul($matkul);
    $data['barang'] = $this->barangModel->getAllBarang();

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
    $matkul = 'KGD';

    $data['prasats'] = $this->prasatModel->getPrasatByMatkul($matkul);
    $data['barang'] = $this->barangModel->getAllBarang();

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
    $matkul = 'KJ';

    $data['prasats'] = $this->prasatModel->getPrasatByMatkul($matkul);
    $data['barang'] = $this->barangModel->getAllBarang();
  

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
    $matkul = 'KG';
    
    $data['prasats'] = $this->prasatModel->getPrasatByMatkul($matkul);
    $data['barang'] = $this->barangModel->getAllBarang();

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
    $matkul = 'KKOM';

    $data['prasats'] = $this->prasatModel->getPrasatByMatkul($matkul);
    $data['barang'] = $this->barangModel->getAllBarang();

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
    $matkul = 'KD';

    $data['prasats'] = $this->prasatModel->getPrasatByMatkul($matkul);
    $data['barang'] = $this->barangModel->getAllBarang();

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
    $matkul = 'IBD';
  
    $data['prasats'] = $this->prasatModel->getPrasatByMatkul($matkul);
    $data['barang'] = $this->barangModel->getAllBarang();
    

    if (session()->get('role') == 'admin') {
      return view('admin/prasat/ibd', $data);
    } elseif (session()->get('role') == 'user') {
      return view('user/prasat/ibd', $data);
    } else {
      return redirect()->to('/login');
    }
  }

  public function store()
  {
    $fullUrl = strtoupper($this->request->getPath());
    $matkul = explode('/', $fullUrl)[2];
    $data = [
      'kode_brg' => $this->request->getPost('kode_brg'),
      'matkul' => $matkul,
    ];

    $mutate = $this->prasatModel->insertPrasat($data);

    if (!$mutate) {
      return redirect()->back()->with('error', 'Data barang gagal ditambahkan');
    }

    if ($matkul == 'IBD') {
      return redirect()->to('/admin/prasat/IBD')->with('success', 'Data barang berhasil ditambahkan');
    } elseif ($matkul == 'KMB') {
      return redirect()->to('/admin/prasat/KMB')->with('success', 'Data barang berhasil ditambahkan');
    } elseif ($matkul == 'KA') {
      return redirect()->to('/admin/prasat/KA')->with('success', 'Data barang berhasil ditambahkan');
    } elseif ($matkul == 'KM') {
      return redirect()->to('/admin/prasat/KM')->with('success', 'Data barang berhasil ditambahkan');
    } elseif ($matkul == 'KGD') {
      return redirect()->to('/admin/prasat/KGD')->with('success', 'Data barang berhasil ditambahkan');
    } elseif ($matkul == 'KJ') {
      return redirect()->to('/admin/prasat/KJ')->with('success', 'Data barang berhasil ditambahkan');
    } elseif ($matkul == 'KG') {
      return redirect()->to('/admin/prasat/KG')->with('success', 'Data barang berhasil ditambahkan');
    } elseif ($matkul == 'KKOM') {
      return redirect()->to('/admin/prasat/KKOM')->with('success', 'Data barang berhasil ditambahkan');
    } elseif ($matkul == 'KD') {
      return redirect()->to('/admin/prasat/KD')->with('success', 'Data barang berhasil ditambahkan');
    } else {
      return redirect()->back()->with('error', 'Kategori Salah');
    }
  }

  public function destroy($id = null)
  {
    $this->prasatModel->deletePrasat($id);
    return redirect()->back()->with('success', 'Data Barang Berhasil dihapus');
  }

}
