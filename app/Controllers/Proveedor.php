<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Configuracion;
use App\Models\ConfiguracionModel;
use App\Models\ProveedorModel;
use App\Controllers\OrdenesCompra;


class Proveedor extends BaseController
{
    protected $configuracion;
    protected $proveedor;
    protected $ordenesCompra;


    public function __construct()
    {
        $this->configuracion = new ConfiguracionModel;
        $this->proveedor = new ProveedorModel;
        $this->ordenesCompra = new OrdenesCompra;
    }

    public function index()
    {
        #Condicion para mostrar los productos mayor al stock critico

        $proveedor = $this->proveedor->findall();
        $configuracion = $this->configuracion->First();
        $data = ['datos' => $proveedor, 'configuracion' => $configuracion];
        $estados = [
            'e_producto' => '',
            'e_ordencompra' => '',
            'e_proveedor' => '',
            'e_config' => 'active'
        ];
        echo view('header', $data);
        echo view('Empleado/panel_header_emp', $estados);
        echo view('Empleado/proveedor_emp');
        echo view('administrador/panel_footer');
        echo view('footer');
    }

    
}
