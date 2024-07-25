<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\BarangModel;
use App\Models\PrasatModel;

class Prasats extends ResourceController
{
    protected $barangModel;
    protected $prasatModel;
    protected $helpers = ['user'];

    function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->prasatModel = new PrasatModel();
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['prasats'] = $this->prasatModel->getAll();
        return view('prasat/IBD', $data);
    }

    /**
     * Return the properties of a resource object.
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
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        return view('prasat/new');
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        return view('prasat/ibd');
    }

    public function store()
    {
        $kode_brg = $this->request->getPost('kode_brg');
    
    // cek jika kode barang sudah ada
    $existingBarang = $this->prasatModel->where('kode_brg', $kode_brg)->first();
    
    if ($existingBarang) {
        return redirect()->to('/prasats')->with('error', 'Kode Barang sudah ada. Mohon gunakan kode yang lain.');
    }
    
    $data = [
        'nama_brg' => $this->request->getPost('brg_nama'),
        'spesifikasi' => $this->request->getPost('spesifikasi'),
        'thn_pembelian' => $this->request->getPost('thn_pembelian'),
        'kategori' => $this->request->getPost('kategori'),
        'kondisi_baik' => $this->request->getPost('kondisi_baik'),
        'kondisi_rusak' => $this->request->getPost('kondisi_rusak'),
        'jml_akhir' => $this->request->getPost('jml_akhir'),
        'kode_brg' => $kode_brg,
    ];

    $this->prasatModel->insert($data);

    return redirect()->to('/prasats')->with('success', 'Data barang berhasil ditambahkan.');
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        return view('prasat/edit');
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }

    public function KMD()
    {
        return view('prasat/kmd');
    }

    public function KA()
    {
        return view('prasat/ka');
    }

    public function KM()
    {
        return view('prasat/km');
    }

    public function KGD()
    {
        return view('prasat/kgd');
    }

    public function KJ()
    {
        return view('prasat/kj');
    }

    public function KG()
    {
        return view('prasat/kg');
    }

    public function KKOM()
    {
        return view('prasat/kkom');
    }

    public function KD()
    {
        return view('prasat/kd');
    }

    public function IBD()
    {
        if ($this->request->getMethod() === 'post') {
            $data = $this->request->getPost();
            
            if ($this->validate([
                'nama_brg' => 'required|min_length[3]|max_length[255]',
                'spesifikasi' => 'required',
                'thn_pembelian' => 'required|numeric',
                'kategori' => 'required',
                'kondisi_baik' => 'required|numeric',
                'kondisi_rusak' => 'required|numeric',
                'jml_akhir' => 'required|numeric',
                'id' => 'required|numeric'
            ])) {
                $this->prasatModel->save([
                    'nama_brg' => $data['nama_brg'],
                    'spesifikasi' => $data['spesifikasi'],
                    'thn_pembelian' => $data['thn_pembelian'],
                    'kategori' => $data['kategori'],
                    'kondisi_baik' => $data['kondisi_baik'],
                    'kondisi_rusak' => $data['kondisi_rusak'],
                    'jml_akhir' => $data['jml_akhir'],
                    'id' => $data['id']
                ]);

                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }
        }

        $data['prasats'] = $this->prasatModel->getAll();
        return view('prasat/ibd', $data);
    }
}
