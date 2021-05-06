<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NotaCreditoModel;

class NotasCredito extends BaseController
{
	protected $notascredito;

	public function __construct()
	{
		$this->notascredito = new NotaCreditoModel;
	}

	public function index()
	{
		/*$usuarios = $this->usuario->findAll();
		$data = ['titulo' => 'Usuarios', 'datos' => $usuarios];*/
		
		$estados = ['e_venta' => '',
		'e_producto' => '',
		'e_ordencompra' => '',
		'e_usuario' => '',
		'e_notacredito' => 'active',
		'e_config' => ''];

		echo view('header');
		echo view('administrador/panel_header', $estados);
		echo view('administrador/notas_credito');
		echo view('administrador/panel_footer');
		echo view('footer');
	}
}
