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

		echo view('header');
		echo view('administrador/panel_header');
		echo view('administrador/notas_credito');
		echo view('administrador/panel_footer');
		echo view('footer');
	}
}
