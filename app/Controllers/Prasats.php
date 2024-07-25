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
        return view('prasat/index', $data);
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
        //
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
        $data['prasats'] = $this->prasatModel->getAll();
        return view('prasat/ibd', $data);
    }
}
