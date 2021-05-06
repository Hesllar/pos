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

		$estados = ['e_venta' => '',
		'e_producto' => 'active',
		'e_ordencompra' => '',
		'e_usuario' => '',
		'e_notacredito' => '',
		'e_config' => ''];

        echo view('header');
        echo view('administrador/panel_header', $estados);
        echo view('administrador/productos_admin');
        echo view('administrador/panel_footer');
        echo view('footer');
    }
}
