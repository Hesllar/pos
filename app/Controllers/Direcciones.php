<?php

namespace App\Controllers;

use App\Models\DireccionModel;

class Direcciones extends BaseController
{
	protected $direccion;
	protected $request;

	public function __construct()
	{

		$this->direccion = new DireccionModel;
	}


	public function index()
	{

	}

	public function agregarDireccion(){
		$this->request = \Config\Services::request();
		date_default_timezone_set("America/Santiago");

		$this->direccion->save([
			'calle' => $this->request->getVar('d_calle'),
			'numero' => $this->request->getVar('d_numero'),
			'piso' => ('-'),
			'referencia' => ('-'),
			'ciudad' => $this->request->getVar('d_ciudad'),
			'comuna_fk' => $this->request->getVar('d_comuna_id'),
		]);
		$dr = $this->direccion->orderBy('id_direccion', 'DESC')->First();
		return $dr['id_direccion'];
	}
}
