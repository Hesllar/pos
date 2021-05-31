<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ComunaModel;
use App\Models\CostoComunaModel;

use CodeIgniter\HTTP\Request;

class Comuna extends BaseController
{
    protected $comuna;
    protected $costoComuna;
    protected $request;

    public function __construct()
    {
        $this->comuna = new ComunaModel;
        $this->costoComuna = new CostoComunaModel;
    }

    public function index()
    {
    }
    public function action()
    {
        $this->request = \Config\Services::request();
        if ($this->request->getVar('action')) {
            $action = $this->request->getVar('action');
            if ($action == 'get_comuna') {
                $asigComuna = $this->comuna->where('region_fk', $this->request->getVar('id_region'))->findAll();
            }
            echo json_encode($asigComuna);
        }
    }

    public function listarComuna(){
        $this->request = \Config\Services::request();
        echo json_encode($this->comuna->where('region_fk', $this->request->getVar('id_region'))->findAll());
    }

    public function costoComuna(){
        $this->request = \Config\Services::request();
        echo json_encode($this->costoComuna->where('comuna_fk', $this->request->getVar('id_comuna'))->First());
    }

    public function obtenerCostoId($id){
        return $this->costoComuna->select('id_costo')->where('comuna_fk', $id)->First();
    }

}
