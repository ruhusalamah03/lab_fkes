<?php

namespace App\Controllers;

use App\Models\BarangModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourcePresenter;

class Barang extends ResourcePresenter
{
  protected $barangModel;
  protected $helpers = ['user'];

  public function __construct()
  {
    $this->barangModel = new BarangModel();
  }
  /**
   * Present a view of resource objects.
   *
   * @return ResponseInterface
   */
  public function index()
  {
    $data['barang'] = $this->barangModel->findAll();
    return view('admin/barang/index', $data);
  }

  public function detail()
  {
    $kode_brg = $this->request->getGet('kode_brg');
    $barang = $this->barangModel->getDetailBarang($kode_brg);

    if ($barang) {
      return $this->response->setJSON($barang);
    } else {
      return $this->response->setJSON(['error' => 'No data found']);
    }
  }

  /**
   * Present a view to present a specific resource object.
   *
   * @param int|string|null $id
   *
   * @return ResponseInterface
   */
  public function show($id = null)
  {
    //
  }

  /**
   * Present a view to present a new single resource object.
   *
   * @return ResponseInterface
   */
  public function new()
  {
    return view('/admin/barang/new');
  }

  /**
   * Process the creation/insertion of a new resource object.
   * This should be a POST.
   *
   * @return ResponseInterface
   */
  public function create()
  {
    return view('admin/barang/create');
  }

  public function store()
  {
    $kode_brg = $this->request->getPost('kode_brg');

    // cek jika kode barang sudah ada
    $existingBarang = $this->barangModel->where('kode_brg', $kode_brg)->first();

    if ($existingBarang) {
      return redirect()->to('admin/barang')->with('error', 'Kode Barang sudah ada. Mohon gunakan kode yang lain.');
    }

    $data = [
      'kode_brg' => $kode_brg,
      'nama_brg' => $this->request->getPost('brg_nama'),
      'spesifikasi' => $this->request->getPost('spesifikasi'),
      'thn_pembelian' => $this->request->getPost('thn_pembelian'),
      'kategori' => $this->request->getPost('kategori'),
      'kondisi_baik' => $this->request->getPost('kondisi_baik'),
      'kondisi_rusak' => $this->request->getPost('kondisi_rusak'),
      'jml_akhir' => $this->request->getPost('jml_akhir'),
    ];

    $this->barangModel->insert($data);

    return redirect()->to('admin/barang')->with('success', 'Data barang berhasil ditambahkan.');
  }

  /**
   * Present a view to edit the properties of a specific resource object.
   *
   * @param int|string|null $id
   *
   * @return ResponseInterface
   */
  public function edit($id = null)
  {
    $id = $this->request->getPost('id');

    $barang = $this->barangModel->where('id', $id)->first();
    if (is_object($barang)) {
      $data['barang'] = $barang;
      return view('admin/barang/edit', $data);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }


  /**
   * Process the updating, full or partial, of a specific resource object.
   * This should be a POST.
   *
   * @param int|string|null $id
   *
   * @return ResponseInterface
   */
  public function update($id = null)
  {
    $data = $this->request->getPost();
    $this->barangModel->update($id, $data);
    return redirect()->to(site_url('admin/barang'))->with('success', 'Data Berhasil Diubah');
  }

  /**
   * Present a view to confirm the deletion of a specific resource object.
   *
   * @param int|string|null $id
   *
   * @return ResponseInterface
   */
  public function remove($id = null)
  {
    //
  }

  /**
   * Process the deletion of a specific resource object.
   *
   * @param int|string|null $id
   *
   * @return ResponseInterface
   */
  public function delete($id = null)
  {
    error_log("Delete method called with ID: $id");
    $this->barangModel->where('id', $id)->delete();
    return redirect()->to(site_url('/admin/barang'))->with('success', 'Data Berhasil Dihapus');
  }


  public function printBarang()
  {
    $barang = new BarangModel();

    $data = [
      'barang' => $barang->getAllBarang()
    ];

    return view('admin/barang/data-print', $data);
  }

  public function updateFromPrasat($kode_brg = null)
  {
    $fullUrl = strtoupper($this->request->getPath());
    $matkul = explode('/', $fullUrl)[2];
    $data = [
      'nama_brg' => $this->request->getPost('brg_nama'),
      'spesifikasi' => $this->request->getPost('spesifikasi'),
      'thn_pembelian' => $this->request->getPost('thn_pembelian'),
      'kategori' => $this->request->getPost('kategori'),
      'kondisi_baik' => $this->request->getPost('kondisi_baik'),
      'kondisi_rusak' => $this->request->getPost('kondisi_rusak'),
      'jml_akhir' => $this->request->getPost('jml_akhir'),
    ];
    $this->barangModel->updateBarangByKode($kode_brg, $data);

    if ($matkul == 'IBD') {
      return redirect()->to('/admin/prasat/IBD')->with('success', 'Data Berhasil Diubah');
    } elseif ($matkul == 'KMB') {
      return redirect()->to('/admin/prasat/KMB')->with('success', 'Data Berhasil Diubah');
    } elseif ($matkul == 'KD') {
      return redirect()->to('/admin/prasat/KD')->with('success', 'Data Berhasil Diubah');
    } elseif ($matkul == 'KA') {
      return redirect()->to('/admin/prasat/KA')->with('success', 'Data Berhasil Diubah');
    } elseif ($matkul == 'KM') {
      return redirect()->to('/admin/prasat/KM')->with('success', 'Data Berhasil Diubah');
    } elseif ($matkul == 'KGD'){
      return redirect()->to('/admin/prasat/KGD')->with('success', 'Data Berhasil Diubah');
    } elseif ($matkul == 'KJ'){
      return redirect()->to('/admin/prasat/KJ')->with('success', 'Data Berhasil Diubah');
    } elseif ($matkul == 'KG'){
      return redirect()->to('/admin/prasat/KG')->with('success', 'Data Berhasil Diubah');
    } elseif ($matkul == 'KKOM'){
      return redirect()->to('/admin/prasat/KKOM')->with('success', 'Data Berhasil Diubah');
    } else {
      return redirect()->back()->with('error', 'Data Gagal Diubah');
    }
  }
}