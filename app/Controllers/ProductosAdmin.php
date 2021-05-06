<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductosAdminModel;

class ProductosAdmin extends BaseController
{
    protected $productos;

    public function __construct()
    {
        $this->productos = new ProductosAdminModel();
    }

    public function index()
    {
        /*
        $productos = $this->productos->findAll();
        $data = ['titulo' => 'Productos', 'datos' => $productos]; */

        echo view('header');
        echo view('administrador/panel_header');
        echo view('administrador/productos_admin');
        echo view('administrador/panel_footer');
        echo view('footer');
    }
}
