<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;

class Categorias extends BaseController
{
	protected $categorias;

	public function __construct()
	{
		$this->categorias = new CategoriaModel;
	}

	public function index()
	{
		$categorias = $this->categorias->findAll();
		$data = ['titulo' => 'Categorias', 'datos' => $categorias];

		echo view('header');
		echo view('index');
		echo view('footer');
	}

	public function insertar()
	{
		/* $this->cargo->save(['nombre_cargo']) */
	}
}
