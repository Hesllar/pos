<?php

namespace App\Controllers;

use App\Models\ConfiguracionModel;
use App\Models\OrdenCompraModel;
use App\Models\DetalleOrdenCompraModel;

use App\Controllers\Empleados;
use App\Controllers\Proveedor;
use App\Controllers\Productos;

class RecepcionProductos extends BaseController
{
	protected $configuracion;
	protected $orden_compra;
	protected $detalle_orden;
	protected $empleados;
	protected $proveedor;
	protected $productos;
	protected $request;
	protected $session;


	public function __construct()
	{
		$this->session = session();
		$this->configuracion = new ConfiguracionModel;
		$this->orden_compra = new OrdenCompraModel;
		$this->detalle_orden = new DetalleOrdenCompraModel;
		$this->empleados = new Empleados;
		$this->proveedor = new Proveedor;
		$this->productos = new Productos;
	}


	public function index()
	{
		$data = [
			'titulo' => 'Usuarios',
			'configuracion' => $this->config(),
			'scripts' => base_url('js/recepcion_productos.js')
		];
		echo view('header', $data);
		echo view('administrador/panel_header', $this->estados());
		echo view('administrador/recepcion_productos', $data);
		echo view('administrador/panel_footer');
		echo view('footer', $data);
	}

	public function estados()
	{
		$estados = [
			'e_venta' => '',
			'e_producto' => '',
			'e_ordencompra' => '',
			'e_recepcion' => 'active',
			'e_usuario' => '',
			'e_notacredito' => '',
			'e_config' => '',
			'e_estadistica' => '',
			'e_tipomoneda' => ''
		];
		return $estados;
	}

	public function config()
	{
		return $this->configuracion->First();
	}

	public function listarOrdenes()
	{
		return $this->orden_compra->where('estado_orden', 1)->findAll();
	}

	public function formatoTabla($arr = null)
	{
		$arr == null ? $arr = $this->listarOrdenes() : null;
		$salida = [];
		//number_format($suma, 0);
		foreach ($arr as $key => $a) {
			$arrTemp = array(
				$a['id_orden'],
				$a['fecha_emision'],
				$this->empleados->buscarNombrePorId($a['empleado_fk']),
				$this->proveedor->buscarPorId($a['proveedor_fk'])['nombre'],
				'$' . number_format($a['valor_total'], 0, "", "."),
				'<div class="actions-secondary bg-no">
				<a class="borders-a-s" href="' . base_url() . '/RecepcionProductos/recepcionar/' . $a['id_orden'] . '"></a>
				</div>'
			);
			array_push($salida, $arrTemp);
		}
		return json_encode($salida);
	}

	public function recepcionar($id)
	{
		//$id == null ? 

		$data = [
			'titulo' => 'Usuarios',
			'orden' => $this->formatoRecepcion($id),
			'configuracion' => $this->config(),
			'scripts' => base_url('js/recepcionar.js')
		];

		echo view('header', $data);
		echo view('administrador/panel_header', $this->estados());
		echo view('administrador/recepcionar', $data);
		echo view('administrador/panel_footer');
		echo view('footer', $data);
	}

	public function formatoRecepcion($id)
	{
		$orden = $this->orden_compra->where('id_orden', $id)->First();
		$orden['valor_neto'] = '$' . number_format($orden['valor_neto'], 1, ",", ".");
		$orden['valor_iva'] = '$' . number_format($orden['valor_iva'], 1, ",", ".");
		$orden['valor_total'] = '$' . number_format($orden['valor_total'], 0, "", ".");
		$orden['empleado_fk'] = $this->empleados->buscarNombrePorId($orden['empleado_fk']);
		$orden['proveedor_fk'] = $this->proveedor->buscarPorId($orden['proveedor_fk']);


		return $orden;
	}

	public function formatoProductos($id)
	{
		$detalle = $this->detalle_orden->where('n_orden_pk', $id)->findAll();
		$detalleTabla = [];

		foreach ($detalle as $i => $d) {
			$prod = $this->productos->buscarNombrePorId($d['id_producto_pk']);
			$arrTemp = array(
				$prod['id_producto'],
				$prod['nombre'],
				$prod['marca'],
				$d['cantidad'],
				"<input type='number' id='cr-" . $d['id_producto_pk'] . "' value= '0' 
				class='form-control c-recibida text-center' min='0' max='" . $d['cantidad'] . "'>",
				"<div style='position: absolute;'><i class='fas fa-dollar-sign icon-input'></i></div>
				<input type='text' id='pc-" . $d['id_producto_pk'] . "' value='" . number_format($d['precio_costo'], 0, "", ".") . "' 
				class='form-control text-center sap' disabled>",
				'<span id="va-' . $d['id_producto_pk'] . '" class="prev-valor"></span>
				<span id="vt-' . $d['id_producto_pk'] . '">$' . number_format($d['valor_total'], 0, "", ".") . '</span>',
				$d['precio_costo'],
				$d['precio_costo'] * $d['cantidad'],
				0,
				$d['id_detalle_orden']

			);
			array_push($detalleTabla, $arrTemp);
		}
		return json_encode($detalleTabla);
	}

	public function confirmar()
	{
		$this->request = \Config\Services::request(); //Inicializando peticion js
		$arrayProductos = $this->request->getVar('arrayOrdenDetalle'); //Recibiendo array productos
		$nOrden = $this->request->getVar('orden');
		foreach ($arrayProductos as $key => $p) {
			$cantidad = $p[9] / $p[7];
			$ar = ['cantidad_recibida' => $cantidad, 'valor_total' => $p[9]];
			$this->detalle_orden->update($p[10], $ar);
		}
		$this->orden_compra->update($nOrden, ['estado_orden' => 2]);
	}
}
