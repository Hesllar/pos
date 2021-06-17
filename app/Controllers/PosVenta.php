<?php

namespace App\Controllers;

use App\Models\ProductosModel;
use App\Models\VentaModel;

class PosVenta extends BaseController
{

	public function __construct()
	{

		$this->productos = new ProductosModel;
	}


	public function index()
	{

	}

}