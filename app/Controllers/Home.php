<?php

namespace App\Controllers;

use App\Models\ConfiguracionModel;
use App\Models\ProductosModel;
class Home extends BaseController
{
	protected $configuracion;
	protected $productos;
	public function __construct()
	{
		$this->configuracion = new ConfiguracionModel;
		$this->productos = new ProductosModel();
	}

	public function index()
	{
		$destacado = $this->productos->masvendido();
		$configuracion = $this->configuracion->First();
		$data = ['titulo' => 'Inicio', 'configuracion' => $configuracion,'destacado'=>$destacado];
		echo view('header', $data);
		echo view('index');
		echo view('footer', $data);
	}
}
