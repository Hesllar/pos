<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\OrdenCompraModel;
use App\Models\ConfiguracionModel;
use App\Models\DetalleOrdenCompraModel;
use App\Models\ProveedorModel;
use App\Models\ProductosAdminModel;
use App\Models\EmpleadoModel;


class OrdenesCompra extends BaseController
{
	protected $ordenescompra;
	protected $request;
	protected $session;
	protected $detalle;
	protected $proveedor;
	protected $productos;
	protected $empleado;




	public function __construct()
	{
		$this->session = session();
		$this->empleado = new EmpleadoModel;
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
		echo view('ordenjs');
	}

	public function traerOrden()
	{

		$configuracion = $this->configuracion->First();
		$ordenescompra = $this->ordenescompra->findAll();
		$data = ['ordenCompra' => $ordenescompra, 'configuracion' => $configuracion];
		$estados = [
			'e_producto' => '',
			'e_ordencompra' => 'active',
			'e_proveedor' => '',
		];
		echo view('header', $data);
		echo view('Empleado/panel_header_emp', $estados);
		echo view('administrador/ordenes_compra');
		echo view('administrador/panel_footer');
		echo view('footer');
		echo view('ordenjs');
	}
	public function empleadoFk($id_user)
	{
		$datos = $this->empleado->where('usuario_fk', $id_user)->first();
		if ($datos != null) {
			return $datos['id_empleado'];
		} else {
			return 301;
		}
	}
	public function generarOrden()
	{
		$this->request = \Config\Services::request();
		date_default_timezone_set("America/Santiago");
		$this->ordenescompra->save([
			'fecha_emision' => date('Y-m-d G:i:s'),
			'valor_neto' => $this->request->getVar('neto'),
			'valor_iva' => $this->request->getVar('iva'),
			'valor_total' => $this->request->getVar('valorTotal'),
			'estado_orden' => 0,
			'empleado_fk' => $this->empleadoFk($this->request->getVar('id_user')),
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
		if ($this->session->nvl_acceso_fk == 10) {
			return redirect()->to(base_url() . '/OrdenesCompra');
		} else {
			return redirect()->to(base_url() . '/OrdenesCompra/traerOrden');
		}
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
		date_default_timezone_set("America/Santiago");
		$this->ordenescompra->update(
			$this->request->getVar('id_orden'),
			[
				'fecha_update' => date('Y-m-d G:i:s'),
				'valor_neto' => $this->request->getVar('neto'),
				'valor_iva' => $this->request->getVar('iva'),
				'valor_total' => $this->request->getVar('valorTotal'),
				'proveedor_fk' => $this->request->getVar('id_prov'),
				'estado_orden' => 0
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
	public function allDatosProvView($orden)
	{
		$this->ordenescompra->select('id_orden,
		fecha_emision, 
        CONCAT(e.rut_empresa,"-",e.dvempresa) AS rut_emp,
        p.rubro AS rubro,
        e.razon_social AS razon,
        e.telefono AS telefono,
        e.giro AS giro,
		CONCAT("$",FORMAT(valor_neto, "")) AS valor_neto,
		CONCAT("$", FORMAT(valor_iva, "")) AS valor_iva,
		CONCAT("$", FORMAT(valor_total, "")) AS valor_total');
		$this->ordenescompra->join('proveedor as p', 'orden_de_compra.proveedor_fk=p.id_proveedor');
		$this->ordenescompra->join('usuario as u', 'p.usuario_fk=u.id_usuario');
		$this->ordenescompra->join('datos_personales as dp', 'u.rut_fk=dp.rut');
		$this->ordenescompra->join('empresa as e', 'dp.rut=e.DATOS_PERSONALES_rut');
		$this->ordenescompra->where('id_orden', $orden);
		$datos['datos'] = $this->ordenescompra->first();
		return json_encode($datos);
	}

	public function dtsSolicitante($id_orden)
	{
		$this->ordenescompra->select('CONCAT(u.nom_usuario, " - " ,n.nivel_acceso) AS solicitante');
		$this->ordenescompra->join('empleado as e', 'orden_de_compra.empleado_fk=e.id_empleado');
		$this->ordenescompra->join('usuario as u', 'e.usuario_fk=u.id_usuario');
		$this->ordenescompra->join('datos_personales as dp', 'u.rut_fk=dp.rut');
		$this->ordenescompra->join('nivel_acceso as n', 'u.nvl_acceso_fk=n.id_nivel');
		$this->ordenescompra->where('id_orden', $id_orden);
		$datos['datos'] = $this->ordenescompra->first();
		return json_encode($datos);
	}
	public function dtsDetallePro($id_orden)
	{
		$this->detalle->select('p.nombre AS nombre_pro, 
		cantidad, 
		CONCAT("$",FORMAT(detalle_orden_de_compra.precio_costo, "")) as precio_costo, 
		CONCAT("$", FORMAT(valor_total, "")) AS valor_total');
		$this->detalle->join('producto as p', 'detalle_orden_de_compra.id_producto_pk=p.id_producto');
		$this->detalle->where('n_orden_pk', $id_orden);
		$datos['datos'] = $this->detalle->findAll();
		return json_encode($datos);
	}

	public function enviarOrden($id_orden)
	{
		$this->ordenescompra->update(
			$this->ordenescompra->where('id_orden', $id_orden)->first(),
			[
				'estado_orden' => 1
			]
		);
		if ($this->session->nvl_acceso_fk == 10) {
			return redirect()->to(base_url() . '/OrdenesCompra');
		} else {
			return redirect()->to(base_url() . '/OrdenesCompra/traerOrden');
		}
	}
}
