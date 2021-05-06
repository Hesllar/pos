<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdenCompraModel;

class OrdenesCompra extends BaseController
{
	protected $ordenescompra;

	public function __construct()
	{
		$this->ordenescompra = new OrdenCompraModel;
	}

	public function index()
	{
		/*$usuarios = $this->usuario->findAll();
		$data = ['titulo' => 'Usuarios', 'datos' => $usuarios];*/

		echo view('header');
		echo view('administrador/panel_header');
		echo view('administrador/ordenes_compra');
		echo view('administrador/panel_footer');
		echo view('footer');
	}
}
