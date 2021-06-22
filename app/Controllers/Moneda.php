<?php

namespace App\Controllers;

use App\Models\ConfiguracionModel;
use App\Models\TipoMonedaModel;

class Moneda extends BaseController
{
    protected $request;
    protected $moneda;
    public function __construct()
    {
        $this->moneda = new TipoMonedaModel;
        $this->configuracion = new ConfiguracionModel;
    }


    public function index()
    {
        $moneda = $this->moneda->findAll();
        $configuracion = $this->configuracion->First();
        $data = ['titulo' => 'Usuarios', 'configuracion' => $configuracion, 'moneda' => $moneda];
        $estados = [
            'e_venta' => '',
            'e_producto' => '',
            'e_ordencompra' => '',
            'e_usuario' => '',
            'e_notacredito' => '',
            'e_config' => '',
            'e_estadistica' => '',
            'e_tipomoneda' => 'active'
        ];
        echo view('header', $data);
        echo view('administrador/panel_header', $estados);
        echo view('administrador/Moneda', $data);
        echo view('administrador/panel_footer');
        echo view('footer', $data);
    }


    public function crearMoneda()
    {

        $this->request = \Config\Services::request();
        $this->moneda->save([
            'nombre_moneda' => $this->request->getPost('nombre_moneda'),
            'valor_moneda' => $this->request->getPost('valor'),
        ]);
        return redirect()->to(base_url() . '/Moneda');
    }
    public function obtValor()
    {
        $this->request = \Config\Services::request();
        echo json_encode($this->moneda->findAll());
    }
}
