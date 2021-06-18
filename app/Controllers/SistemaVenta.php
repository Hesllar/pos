<?php

namespace App\Controllers;

use App\Models\VentaModel;

class SistemaVenta extends BaseController
{

	protected $request;
	protected $ventas;

	public function __construct()
	{

		//$this->configuracion = new ConfiguracionModel;
		$this->ventas = new VentaModel;
	}


	public function index()
	{
		echo view('sistema_venta');
	}

	public function nuevaVenta(){
		$this->request = \Config\Services::request();
		$totalCompra = $this->request->getVar('total');
		$this->ventas->save([
			'tipo_comprobante' => $this->request->getVar('tipo_comprobante'),
			'fecha_venta' => date('Y-m-d H:i:s'),
			'valor_neto' => (($totalCompra*0.19)-$totalCompra),
			'valor_iva' => ($totalCompra*0.19),
			'total' => $totalCompra,
			'despacho' => $this->request->getVar('venta_despacho'),
			'estado_venta' => 1,
			'empleado_fk' => 301,
			'cliente_fk' => 10,
			'forma_pago_fk' => 1,
		]);
	}
}
