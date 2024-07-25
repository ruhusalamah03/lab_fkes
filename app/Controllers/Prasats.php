<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
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
        return view('prasat/index', $data);
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
        $data['prasats'] = $this->prasatModel->getAll();
        return view('prasat/ibd', $data);
    }

    public function addIBD()
    {
        $prasats = new PrasatModel();
        $data = [
            'title' => 'Data Barang Ilmu Biomedik Dasar',
            'prasats' => $prasats->getIBD(),
        ];
        return view('/prasat/ibd', $data);
    }

}
