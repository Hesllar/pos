<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NotaCreditoModel;
use App\Models\ConfiguracionModel;

class NotasCredito extends BaseController
{
	protected $notascredito;

	public function __construct()
	{
		$this->notascredito = new NotaCreditoModel;
		$this->configuracion = new ConfiguracionModel;
	}

	public function index()
	{
		$configuracion = $this->configuracion->First();
		$data = ['titulo' => 'Usuarios', 'configuracion' => $configuracion];

		$estados = [
			'e_venta' => '',
			'e_producto' => '',
			'e_ordencompra' => '',
			'e_usuario' => '',
			'e_notacredito' => 'active',
			'e_config' => ''
		];

		echo view('header', $data);
		echo view('administrador/panel_header', $estados);
		echo view('administrador/notas_credito');
		echo view('administrador/panel_footer');
		echo view('footer', $data);
	}
}
