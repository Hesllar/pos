<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductosModel;
use App\Models\CategoriaModel;
use App\Models\ConfiguracionModel;

class Productos extends BaseController
{
    protected $productos;
    protected $categorias;

    public function __construct()
    {
        $this->productos = new ProductosModel();
        $this->categorias = new CategoriaModel();
        $this->configuracion = new ConfiguracionModel;
    }

    public function index()
    {
        $productos = $this->productos->findAll();
        $categorias = $this->categorias->findAll();
        $configuracion = $this->configuracion->First();
        $data = ['titulo' => 'Productos', 'datos' => $productos, 'categorias' => $categorias, 'configuracion' => $configuracion];

        echo view('header', $data);
        echo view('Productos/Productos', $data);
        echo view('footer', $data);
    }
}
