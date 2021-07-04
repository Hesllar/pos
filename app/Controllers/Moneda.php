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
        echo view('administrador/Moneda');
        echo view('administrador/panel_footer');
        echo view('footer');
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
        echo json_encode($this->moneda->findAll());
    }
    public function obtDatosMoneda()
    {
        $this->request = \Config\Services::request();
        $datos = $this->moneda->where('id_moneda', $this->request->getVar('id_mone'))->first();
        $data['data'] = $datos;
        return json_encode($data);
    }


    public function editarMoneda($id)
    {
        $this->request = \Config\Services::request();
        $configuracion = $this->configuracion->First();
        $idMoneda = $this->moneda->where('id_moneda', $id)->first();
        $data = ['datos' => $idMoneda, 'configuracion' => $configuracion];
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
        echo view('administrador/editar_moneda');
        echo view('administrador/panel_footer');
        echo view('footer');
    }

    public function actuaMoneda()
    {
        $this->request = \Config\Services::request();
        $this->moneda->update($this->request->getPost('id_moneda'), [
            'nombre_moneda' => $this->request->getPost('nom_moneda'),
            'valor_moneda' => $this->request->getPost('val_moneda'),
        ]);
        return redirect()->to(base_url() . '/Moneda');
    }
}
