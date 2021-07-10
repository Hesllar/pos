<?php

namespace App\Controllers;

use App\Models\ConfiguracionModel;
use App\Models\ContactoModel;

class Contacto extends BaseController
{
	protected $configuracion;
	protected $contacto;
	protected $request;

	public function __construct()
	{
		$this->contacto = new ContactoModel;
		$this->configuracion = new ConfiguracionModel;
	}

	public function index()
	{
		$configuracion = $this->configuracion->First();
		$data = ['titulo' => 'Inicio', 'configuracion' => $configuracion];
		echo view('header', $data);
		echo view('contacto');
		echo view('footer', $data);
		echo view('ordenjs');
	}

	public function agregarMensaje()
	{
		$this->request = \Config\Services::request();
		$this->contacto->save([
			'nombre' => $this->request->getVar('nombre'),
			'email' => $this->request->getVar('email'),
			'asunto' => $this->request->getVar('asunto'),
			'mensaje' => $this->request->getVar('mensaje'),
		]);
	}
}
