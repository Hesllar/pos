<?php

namespace App\Controllers;

use App\Models\ProductosAdminModel;
use App\Models\VentaModel;

class PosVenta extends BaseController
{

	public function __construct()
	{

		$this->productos = new ProductosAdminModel;
	}


	public function index()
	{

	}

}