<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductosAdminModel;
use App\Models\ConfiguracionModel;
use App\Models\CategoriaModel;

class ProductosAdmin extends BaseController
{
    protected $productos;
    protected $categorias;

    public function __construct()
    {
        $this->productos = new ProductosAdminModel();
        $this->configuracion = new ConfiguracionModel;
        $this->categorias = new CategoriaModel();
    }

    public function index()
    {
        /*
        $productos = $this->productos->findAll();
        $data = ['titulo' => 'Productos', 'datos' => $productos]; */
        $categorias = $this->categorias->findAll();
        $productos = $this->productos->findAll();
        $configuracion = $this->configuracion->First();
        $data = ['titulo' => 'Productos', 'datos' => $productos, 'configuracion' => $configuracion, 'categorias' => $categorias];


        $estados = [
            'e_venta' => '',
            'e_producto' => 'active',
            'e_ordencompra' => '',
            'e_usuario' => '',
            'e_notacredito' => '',
            'e_config' => ''
        ];

        echo view('header', $data);
        echo view('administrador/panel_header', $estados);
        echo view('administrador/productos_admin', $data);
        echo view('administrador/panel_footer');
        echo view('footer', $data);
    }

    public function NuevoProducto()
    {
    }
}
