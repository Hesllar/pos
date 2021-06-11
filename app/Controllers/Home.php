<?php

namespace App\Controllers;

use App\Models\ConfiguracionModel;
use App\Models\ProductosAdminModel;
use App\Models\SesionModel;



class Home extends BaseController
{
	protected $sesion;
	protected $configuracion;
	protected $productos;
	public function __construct()
	{
		$this->session = session();
		$this->sesion = new SesionModel;
		$this->configuracion = new ConfiguracionModel;
		$this->productos = new ProductosAdminModel();
	}

	public function index()
	{
		//$this->contarVisitasOff();
		$destacado = $this->productos->masvendido();
		$configuracion = $this->configuracion->First();
		$data = ['titulo' => 'Inicio', 'configuracion' => $configuracion, 'destacado' => $destacado];
		echo view('header', $data);
		echo view('index');
		echo view('footer', $data);
	}

	public function contarVisitasOff()
	{
		$idOff = 0;
		$this->sesion->save([
			'direccion_ip' => 'En proceso',
			'navegador' => 'En proceso',
			'usuario_fk' => $idOff,
			'fecha_sesion' => date('Y-m-d G:i:s')
		]);
	}
}
