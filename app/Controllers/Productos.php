<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;
use App\Models\ConfiguracionModel;
use App\Models\ProductosAdminModel;


class Productos extends BaseController
{
    protected $request;
    protected $productos;
    protected $categorias;
    protected $producto_dispo;


    public function __construct()
    {
        $this->productos = new ProductosAdminModel();
        $this->categorias = new CategoriaModel();
        $this->configuracion = new ConfiguracionModel;
    }

    public function index()
    {
        $this->request = \Config\Services::request();
        #Condicion para mostrar los productos mayor al stock critico
        $productos = $this->productos->orderProducto();
        $categorias = $this->categorias->findAll();
        $configuracion = $this->configuracion->First();
        $data = ['titulo' => 'Productos', 'datos' => $productos, 'categorias' => $categorias, 'configuracion' => $configuracion];

        echo view('header', $data);
        echo view('Productos/Productos', $data);
        echo view('footer', $data);
    }

    public function productoEmp()
    {
        $productos = $this->productos->orderProducto();
        $categorias = $this->categorias->findAll();
        $configuracion = $this->configuracion->First();
        $data = ['titulo' => 'Productos', 'datos' => $productos, 'categorias' => $categorias, 'configuracion' => $configuracion];
        $estados = [
            'e_producto' => '',
            'e_ordencompra' => '',
            'e_proveedor' => '',
            'e_config' => 'active'
        ];
        echo view('header', $data);
        echo view('Empleado/panel_header_emp', $estados);
        echo view('Empleado/productos_emp');
        echo view('administrador/panel_footer');
        echo view('footer');
    }
}
