<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdenCompraModel;
use App\Models\ConfiguracionModel;

class OrdenesCompra extends BaseController
{
	protected $ordenescompra;

	public function __construct()
	{
		$this->ordenescompra = new OrdenCompraModel;
		$this->configuracion = new ConfiguracionModel;
	}

	public function index()
	{
		$configuracion = $this->configuracion->First();
		$data = ['titulo' => 'configuracion', 'configuracion' => $configuracion];

		$estados = [
			'e_venta' => '',
			'e_producto' => '',
			'e_ordencompra' => 'active',
			'e_usuario' => '',
			'e_notacredito' => '',
			'e_config' => '',
			'e_estadistica' => '',
			'e_tipomoneda' => ''
		];

		echo view('header', $data);
		echo view('administrador/panel_header', $estados);
		echo view('administrador/ordenes_compra');
		echo view('administrador/panel_footer');
		echo view('footer', $data);
	}

	public function traerOrden()
	{

		$configuracion = $this->configuracion->First();
		$ordenescompra = $this->ordenescompra->findAll();
		$data = ['ordenCompra' => $ordenescompra, 'configuracion' => $configuracion];
		$estados = [
			'e_producto' => '',
			'e_ordencompra' => '',
			'e_proveedor' => '',
			'e_config' => 'active',
			'e_estadistica' => ''
		];
		echo view('header', $data);
		echo view('Empleado/panel_header_emp', $estados);
		echo view('administrador/ordenes_compra');
		echo view('administrador/panel_footer');
		echo view('footer');
	}
}
