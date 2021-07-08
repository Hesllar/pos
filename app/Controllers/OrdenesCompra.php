<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\OrdenCompraModel;
use App\Models\ConfiguracionModel;
use App\Models\DetalleOrdenCompraModel;
use App\Models\ProveedorModel;
use App\Models\ProductosAdminModel;


class OrdenesCompra extends BaseController
{
	protected $ordenescompra;
	protected $request;
	protected $session;
	protected $detalle;
	protected $proveedor;
	protected $productos;



	public function __construct()
	{
		$this->session = session();
		$this->productos = new ProductosAdminModel;
		$this->proveedor = new ProveedorModel;
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

	public function eliminarOrden($idOrdenDetalle, $idOrden)
	{
		$this->detalle->where('n_orden_pk', $idOrdenDetalle)->delete();
		$this->ordenescompra->where('id_orden', $idOrden)->delete();
		return redirect()->to(base_url() . '/OrdenesCompra');
	}

	public function eliminarOrdenDetalle($idOrdenDetalle, $id_producto)
	{
		$where = "n_orden_pk = '$idOrdenDetalle' AND  id_producto_pk ='$id_producto'";
		$datosDetalle = $this->detalle->where($where)->first();
		if ($datosDetalle != null) {
			$this->detalle->where($where)->delete();
			return json_encode('Pancho');
		}
	}

	public function editarOrden($idOrden)
	{

		$configuracion = $this->configuracion->First();
		$prove = $this->proveedor->dtsProv($this->session->id_sucursal_fk);
		$orden = $this->ordenescompra->allDatosProv($idOrden);

		$productos = $this->productos->findAll();
		//$listado = $this->cargarProductosSoli($idOrden);

		$data = [
			'datos' => $orden,
			'configuracion' => $configuracion,
			'productos' => $productos,
			'proveedor' => $prove,
			'producSoli' => $this->cargarProductosSoli($idOrden)
		];



		echo view('header', $data);
		echo view('administrador/editar_orden_compra');
		echo view('footer');
		echo view('ordenjs');
	}

	public function cargarProductosSoli($id_orden)
	{
		$datos = $this->ordenescompra->obtProductosSoli($id_orden);

		return $datos;
	}

	public function buscarOrdenPorDetalleProveedor($productoID)
	{
		$ultimoDetalleOrdenProducto = $this->detalle->where('id_producto_pk', $productoID)->orderBy('n_orden_pk', 'DESC')->First();
		$ordenSeleccionada = $this->ordenescompra->where('id_orden', $ultimoDetalleOrdenProducto['n_orden_pk'])->First();
		return $ordenSeleccionada['proveedor_fk'];
	}

	public function actualizarOrden()
	{
		$this->request = \Config\Services::request();
		$this->ordenescompra->update(
			$this->request->getVar('id_orden'),
			[
				'valor_neto' => $this->request->getVar('neto'),
				'valor_iva' => $this->request->getVar('iva'),
				'valor_total' => $this->request->getVar('valorTotal'),
				'proveedor_fk' => $this->request->getVar('id_prov'),
			]
		);
	}
	public function actualizarDetalleOrden($id_orden)
	{
		$this->request = \Config\Services::request();
		$lista = $this->request->getVar('lista');
		$productosBd = $this->detalle->select('id_producto_pk')->where('n_orden_pk', $id_orden)->findAll();
		$booll = false;
		foreach ($lista as $producto) {
			$booll = false;
			foreach ($productosBd as $prodBd) {
				//echo json_encode($producto[0] . $prodBd['id_producto_pk']);
				if ($producto[0] == $prodBd['id_producto_pk']) {
					$booll = true;
					$where = "n_orden_pk = '$id_orden' AND  id_producto_pk ='$producto[0]'";
					$this->detalle->update(
						$this->detalle->where($where)->first(),
						[
							'cantidad' => $producto[1],
							'precio_costo' => $producto[2],
							'valor_total' => $producto[3]
						]
					);
				}
			}
			if ($booll == false) {
				$this->detalle->save([
					'n_orden_pk' => $id_orden,
					'id_producto_pk' => $producto[0],
					'cantidad' => $producto[1],
					'cantidad_recibida' => 0,
					'precio_costo' => $producto[2],
					'valor_total' => $producto[3]
				]);
			}
		}
	}
}
