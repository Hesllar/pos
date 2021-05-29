<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfiguracionModel;
use App\Models\ProductosAdminModel;
use App\Models\VentaModel;
use App\Models\VentasModel;

class Estadistica extends BaseController
{
    protected $configuracion;
    protected $productos;
    protected $ventas;

    public function __construct()
    {
        $this->ventas = new VentaModel;
        $this->productos = new ProductosAdminModel;
        $this->configuracion = new ConfiguracionModel;
    }

    public function index()
    {
        $totalProduc = $this->productos->totalProductos();
        $totalVenta = $this->ventas->todasLasVentas();
        $configuracion = $this->configuracion->First();
        $data = ['configuracion' => $configuracion, 'productos' => $totalProduc, 'ventas' => $totalVenta];
        $estados = [
            'e_venta' => '',
            'e_producto' => 'active',
            'e_ordencompra' => '',
            'e_usuario' => '',
            'e_notacredito' => '',
            'e_config' => '',
            'e_estadistica' => ''
        ];

        echo view('header', $data);
        echo view('administrador/panel_header', $estados);
        echo view('administrador/informes');
        echo view('administrador/panel_footer');
        echo view('footer');
    }


    public function traerStockProduc()
    {

        $this->productos->select('nombre,stock');
        $resultado = $this->productos->findAll();

        echo json_encode($resultado);
    }
}
