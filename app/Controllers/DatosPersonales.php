<?php

namespace App\Controllers;

use App\Models\DatosPersonalesModel;

class DatosPersonales extends BaseController
{
	protected $datospersonales;

	public function __construct()
	{
		$this->datospersonales = new DatosPersonalesModel;
	}

	public function index()
	{

	}

	public function listar()
	{
		$datospersonales = $this->datospersonales->FindAll();
		return $datospersonales;
	}
	
	
}
