<?php

namespace App\Controllers;

use App\Models\VentaModel;
use App\Models\DetalleVentaModel;

class SistemaVenta extends BaseController
{

	protected $request;
	protected $ventas;
	protected $detalle_venta;

	public function __construct()
	{

		//$this->configuracion = new ConfiguracionModel;
		$this->ventas = new VentaModel;
		$this->detalle_venta = new DetalleVentaModel;
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
			'valor_neto' => ($totalCompra-($totalCompra*0.19)),
			'valor_iva' => ($totalCompra*0.19),
			'total' => $totalCompra,
			'despacho' => $this->request->getVar('venta_despacho'),
			'estado_venta' => 1,
			'empleado_fk' => 301,
			'cliente_fk' => 10,
			'forma_pago_fk' => $this->request->getVar('f_pago'),
		]);
	}

	function nuevoDetalleVenta(){
		$this->request = \Config\Services::request(); //Inicializando peticion js
		$ultima_venta = $this->ventas->orderBy('id_venta', 'DESC')->first(); //Buscando ultima venta
		$productos = $this->request->getVar('arrayProductosDetalle'); //Recibiendo array productos
		//Recorriendo y agregando productos
		foreach ($productos as $key => $producto) {
			$this->detalle_venta->save([
				'id_producto_pk' => $producto[0],
				'id_venta_pk' => $ultima_venta['id_venta'],
				'cantidad' => $producto[1]
			]);
		}
	}

}
