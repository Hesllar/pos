<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductosModel;

class Productos extends BaseController
{
	protected $productos;

	public function __construct()
	{
		$this->productos = new ProductosModel;
	}

	public function index()
	{
		/*$usuarios = $this->usuario->findAll();
		$data = ['titulo' => 'Usuarios', 'datos' => $usuarios];*/

		echo view('header');
		echo view('administrador/panel_header');
		echo view('administrador/productos');
		echo view('administrador/panel_footer');
		echo view('footer');
	}
}
