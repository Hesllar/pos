<?php

namespace App\Controllers;

use App\Models\ConfiguracionModel;

class Contacto extends BaseController
{
	protected $configuracion;

	public function __construct()
	{
		$this->configuracion = new ConfiguracionModel;
	}

	public function index()
	{
		$configuracion = $this->configuracion->First();
		$data = ['titulo' => 'Inicio', 'configuracion' => $configuracion];
		echo view('header', $data);
		echo view('contacto');
		echo view('footer', $data);
	}
}
