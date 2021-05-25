<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VentaModel;
use App\Models\ConfiguracionModel;



class Canasta extends BaseController
{
    protected $configuracion;
    protected $canasta;
    protected $request;
    protected $carritoArray;

    public function __construct()
    {
        $this->canasta = new VentaModel;
        $this->configuracion = new ConfiguracionModel;
    }

    public function index($carritoArray = null)
    {
        $configuracion = $this->configuracion->First();
        $productos = $carritoArray;
        if ($productos) {
            $data = ['idProd' => $productos['id'], 'configuracion' => $configuracion];
            echo view('header');
            echo view('Productos/Canasta', $data);
            echo view('footer');
        } else {
            $data = ['configuracion' => $configuracion];
            echo view('header', $data);
            echo view('Productos/Canasta');
            echo view('footer');
        }
    }

    public function nuevaCompra()
    {
        $this->request = \Config\Services::request();
        //$ec = $this->request->getPost('tt');
        /*
        $ec = $this->request->getPost('id_prod_carrito');
        $ec = $this->request->getPost('cantidad');
        */
        //$action = $this->request->getVar('compras')."  -  ".$this->request->getVar('id1');
        $carritoArray = json_encode($this->request->getVar('compras'));
        return redirect()->to(base_url() . '/Canasta');
    }
}
