<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdenCompraModel;
use App\Models\ConfiguracionModel;
use App\Models\DetalleOrdenCompraModel;

class OrdenesCompra extends BaseController
{
	protected $ordenescompra;
	protected $request;
	protected $session;
	protected $detalle;

	public function __construct()
	{
		$this->session = session();
		$this->ordenescompra = new OrdenCompraModel;
		$this->configuracion = new ConfiguracionModel;
		$this->detalle = new DetalleOrdenCompraModel;
	}

	public function index()
	{
		$configuracion = $this->configuracion->First();
		$ordenescompra = $this->ordenescompra->findAll();
		$data = ['titulo' => 'configuracion', 'configuracion' => $configuracion, 'ordenCompra' => $ordenescompra,];

		$estados = [
			'e_venta' => '',
			'e_producto' => '',
			'e_ordencompra' => 'active',
			'e_usuario' => '',
			'e_notacredito' => '',
			'e_config' => '',
			'e_estadistica' => '',
			'e_tipomoneda' => ''
		];

		echo view('header', $data);
		echo view('administrador/panel_header', $estados);
		echo view('administrador/ordenes_compra');
		echo view('administrador/panel_footer');
		echo view('footer', $data);
	}

	public function traerOrden()
	{

		$configuracion = $this->configuracion->First();
		$ordenescompra = $this->ordenescompra->findAll();
		$data = ['ordenCompra' => $ordenescompra, 'configuracion' => $configuracion];
		$estados = [
			'e_producto' => '',
			'e_ordencompra' => '',
			'e_proveedor' => '',
			'e_config' => 'active',
			'e_estadistica' => ''
		];
		echo view('header', $data);
		echo view('Empleado/panel_header_emp', $estados);
		echo view('administrador/ordenes_compra');
		echo view('administrador/panel_footer');
		echo view('footer');
	}

	public function generarOrden()
	{
		$this->request = \Config\Services::request();
		$this->ordenescompra->save([
			'valor_neto' => $this->request->getVar('neto'),
			'valor_iva' => $this->request->getVar('iva'),
			'valor_total' => $this->request->getVar('valorTotal'),
			'estado_orden' => 1,
			'empleado_fk' => 301,
			'proveedor_fk' => $this->request->getVar('id_prov'),
		]);
	}

	public function generarDetalleOrd()
	{
		$this->request = \Config\Services::request();
		$ultimoOrden = $this->ordenescompra->orderBy('id_orden', 'DESC')->first();
		$lista = $this->request->getVar('lista');

		foreach ($lista as $producto) {
			$this->detalle->save([
				'n_orden_pk' => $ultimoOrden['id_orden'],
				'id_producto_pk' => $producto[0],
				'cantidad' => $producto[1],
				'cantidad_recibida' => 0,
				'precio_costo' => $producto[2],
				'valor_total' => $producto[3]
			]);
		}
	}
}
