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
    protected $producto_dispo;


    public function __construct()
    {
        $this->productos = new ProductosModel();
        $this->categorias = new CategoriaModel();
        $this->configuracion = new ConfiguracionModel;
    }

    public function index()
    {
        #Condicion para mostrar los productos mayor al stock critico
        $productos = $this->productos->where('stock > stock_critico')->findall();
        $categorias = $this->categorias->findAll();
        $configuracion = $this->configuracion->First();
        $data = ['titulo' => 'Productos', 'datos' => $productos, 'categorias' => $categorias, 'configuracion' => $configuracion];

        echo view('header', $data);
        echo view('Productos/Productos', $data);
        echo view('footer', $data);
    }
}
