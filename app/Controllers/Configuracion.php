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
		/*$usuarios = $this->usuario->findAll();
		$data = ['titulo' => 'Usuarios', 'datos' => $usuarios];*/

		echo view('header');
		echo view('administrador/panel_header');
		echo view('administrador/configuracion');
		echo view('administrador/panel_footer');
		echo view('footer');
	}
}
