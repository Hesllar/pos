<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VentaModel;

class Ventas extends BaseController
{
	protected $ventas;

	public function __construct()
	{
		$this->ventas = new VentaModel;
	}

	public function index()
	{
		/*$usuarios = $this->usuario->findAll();
		$data = ['titulo' => 'Usuarios', 'datos' => $usuarios];*/
		
		$data = ['titulo' => 'Usuarios', 'ventas' => 'active'];

		echo view('header');
		echo view('administrador/panel_header');
		echo view('administrador/ventas');
		echo view('administrador/panel_footer');
		echo view('footer');
	}
	
	
}
