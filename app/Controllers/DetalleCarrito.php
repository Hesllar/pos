<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductosModel;
use App\Models\CategoriaModel;
use App\Models\ConfiguracionModel;

class DetalleCarrito extends BaseController
{
    protected $productos;
    protected $categorias;
    protected $configuracion;

    public function __construct()
    {
        $this->productos = new ProductosModel;
        $this->configuracion = new ConfiguracionModel;
    }

    public function index()
    {
        $productos = $this->productos->findAll();
        $configuracion = $this->configuracion->First();
        $data = ['datos' => $productos, 'configuracion' => $configuracion];

        echo view('header', $data);
        echo view('Productos/carrito');
        echo view('footer');
    }
}
