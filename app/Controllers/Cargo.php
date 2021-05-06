<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CargoModel;

class Cargo extends BaseController
{
	protected $cargo;

	public function __construct()
	{
		$this->cargo = new CargoModel;
	}

	public function index()
	{
		$cargo = $this->cargo->findAll();
		$data = ['titulo' => 'Cargos', 'datos' => $cargo];

		echo view('header');
		echo view('index');
		echo view('footer');
	}
	
	public function insertar()
	{
		/* $this->cargo->save(['nombre_cargo']) */
	}
}
