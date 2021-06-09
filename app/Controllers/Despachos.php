<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DespachoModel;

class Despachos extends BaseController
{
	protected $despachos;

	public function __construct()
	{
		$this->despachos = new DespachoModel;
	}

	public function index()
	{
	}

	public function insertarDespacho($nombre_recibe, $telefono, $costo_despacho, $venta_fk, $costo_comuna_fk)
	{
		$this->despachos->save([
			'fecha_entrega' => date('Y-m-d G:i:s', strtotime(date('Y-m-d G:i:s') . "+ 5 days")),
			'nombre_recibe' => $nombre_recibe,
			'telefono' => $telefono,
			'costo_despacho' => $costo_despacho,
			'estado_despacho' => 'En preparación',
			'venta_fk' => $venta_fk,
			'costo_comuna_fk' => $costo_comuna_fk,
			'costo_peso_fk' => 1
		]);
	}
}
