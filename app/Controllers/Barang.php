<?php

namespace App\Controllers;

use App\Models\BarangModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourcePresenter;
use Kint\Zval\Value;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as ReaderXlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\xlsx;

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
    $currentPage = $this->request->getVar('page_barang') ? (int)$this->request->getVar('page_barang') : 1;
    $perPage = 10;
    $data['barang'] = $this->barangModel->paginate($perPage, 'barang');
    $data['pager'] = $this->barangModel->pager;
    $data['currentPage'] = $currentPage;
    $data['perPage'] = $perPage;
    // $data['barang'] = $this->barangModel->findAll();
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

  public function export()
  {
    $barang = $this->barangModel->findAll();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Kode Barang');
    $sheet->setCellValue('C1', 'Nama Barang');
    $sheet->setCellValue('D1', 'Spesifikasi');
    $sheet->setCellValue('E1', 'Tahun Pembelian');
    $sheet->setCellValue('F1', 'Kategori');
    $sheet->setCellValue('G1', 'Kondisi Baik');
    $sheet->setCellValue('H1', 'Kondisi Rusak');
    $sheet->setCellValue('I1', 'Jumlah Akhir');

    $column = 2;
    foreach ($barang as $key => $value) {
      $sheet->setCellValue('A'.$column, ($column-1));
      $sheet->setCellValue('B'.$column, $value->kode_brg);
      $sheet->setCellValue('C'.$column, $value->nama_brg);
      $sheet->setCellValue('D'.$column, $value->spesifikasi);
      $sheet->setCellValue('E'.$column, $value->thn_pembelian);
      $sheet->setCellValue('F'.$column, $value->kategori);
      $sheet->setCellValue('G'.$column, $value->kondisi_baik);
      $sheet->setCellValue('H'.$column, $value->kondisi_rusak);
      $sheet->setCellValue('I'.$column, $value->jml_akhir);
      $column++;
    }
    
    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheethtml.sheet');
    header('Content-Disposition: attachment;filename=barang.xlsx');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
    exit();
    // $barang = new BarangModel();

    // $data = [
    //   'barang' => $barang->getAllBarang()
    // ];

    // return view('admin/barang/export', $data);
  }

  public function import()
  {
    $file = $this->request->getFile('file_excel');
    $extension = $file->getClientExtension();
    if ($extension == 'xlsx' || $extension == 'xls') {
      if ($extension == 'xls') {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
      } else {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
      }
      $spreadsheet = $reader->load($file);
      $barang = $spreadsheet->getActiveSheet()->toArray();
      foreach ($barang as $key => $value) {
        if($key == 0) {
          continue;
        }
        $data = [
          'kode_brg' => $value[1],
          'nama_brg' => $value[2],
          'spesifikasi' => $value[3],
          'thn_pembelian' => $value[4],
          'kategori' => $value[5],
          'kondisi_baik' => $value[6],
          'kondisi_rusak' => $value[7],
          'jml_akhir' => $value[8],
        ];
        $this->barangModel->insert($data);
      }
      return redirect()->back()->with('success', 'Data excel berhasil diimport');
    } else {
        return redirect()->back()->with('error', 'Format file tidak sesuai');
    }
  }
}