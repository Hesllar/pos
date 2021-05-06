<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductosModel;

class Productos extends BaseController
{
    protected $productos;

    public function __construct()
    {
        $this->productos = new ProductosModel();
    }

    public function index()
    {
        $productos = $this->productos->findAll();
        $data = ['titulo' => 'Productos', 'datos' => $productos];

        echo view('header');
        echo view('Productos/Productos', $data);
        echo view('footer');
    }
}
