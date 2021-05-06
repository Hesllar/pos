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

		$estados = ['e_venta' => '',
		'e_producto' => '',
		'e_ordencompra' => '',
		'e_usuario' => '',
		'e_notacredito' => '',
		'e_config' => 'active'];

		echo view('header');
		echo view('administrador/panel_header', $estados);
		echo view('administrador/configuracion');
		echo view('administrador/panel_footer');
		echo view('footer');
	}
}
