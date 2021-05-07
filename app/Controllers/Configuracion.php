<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfiguracionModel;

class Configuracion extends BaseController
{
	protected $configuracion;

	public function __construct()
	{
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
			'e_notacredito' => '',
			'e_config' => 'active'
		];

		echo view('header', $data);
		echo view('administrador/panel_header', $estados);
		echo view('administrador/configuracion');
		echo view('administrador/panel_footer');
		echo view('footer', $data);
	}
}
