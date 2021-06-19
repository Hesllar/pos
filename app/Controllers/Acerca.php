<?php

namespace App\Controllers;

use App\Models\ConfiguracionModel;

class Acerca extends BaseController
{

	public function __construct()
	{

		$this->configuracion = new ConfiguracionModel;
	}


	public function index()
	{

		$configuracion = $this->configuracion->First();
		$data = ['titulo' => 'Usuarios', 'configuracion' => $configuracion];
		echo view('header', $data);
		echo view('acerca');
		echo view('footer', $data);
	}
}
