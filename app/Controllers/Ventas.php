<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Usuarios;
use App\Controllers\Empleados;
use App\Controllers\FormaPago;
use App\Controllers\Comuna;
use App\Controllers\Despachos;

use App\Models\ConfiguracionModel;
use App\Models\VentaModel;
use App\Models\FormaPagoModel;
use App\Models\DetalleVentaModel;
use CodeIgniter\Session\Session;

class Ventas extends BaseController
{
	protected $ventas;
	protected $request;
	protected $response;
	protected $session;

	public function __construct()
	{
		$this->session = session();
		$this->usuarios = new Usuarios;
		$this->empleados = new Empleados;
		$this->formapago = new FormaPago;
		$this->costoComuna = new Comuna;
		$this->desp = new Despachos;
		$this->session = session();


		$this->detalle_venta = new DetalleVentaModel;
		$this->ventas = new VentaModel;
		$this->configuracion = new ConfiguracionModel;
		$this->forma_pago = new FormaPagoModel;
		$this->boletas = new VentaModel;
	}

	public function index()
	{
		$usuarios = $this->usuarios->listar();
		$empleados = $this->empleados->listar();

		$ventas = $this->ventas->findAll();
		$forma_pago = $this->forma_pago->findAll();
		$v_boletas = $this->ventas->where('tipo_comprobante', 'boleta')->findAll();
		$facturas = $this->ventas->where('tipo_comprobante', 'factura')->findAll();

		$test = ['msje' => 'ddd'];

		foreach ($v_boletas as $boleta) {
			$empleado_fk = $this->empleados->buscarPorId($boleta['empleado_fk']);
			$nom_empleado = $this->usuarios->buscarPorId($empleado_fk['usuario_fk']);

			$nom_cliente = $this->usuarios->buscarPorId($boleta['cliente_fk']);
			$nom_pago = $this->formapago->buscarPorId($boleta['forma_pago_fk']);


			$boleta['nom_empleado'] = $nom_empleado['nom_usuario'];
			$boleta['nom_cliente'] = $nom_cliente['nom_usuario'];
			$boleta['nom_pago'] = $nom_pago['tipo_pago'];
			$boleta['despacho_str'] = $this->despachoString($boleta['despacho']);
			$boleta['estado_str'] = $this->estadoVentaString($boleta['estado_venta']);
			$boletas[] = $boleta;
		}

		#print_r($boletas['id_venta']);
		$configuracion = $this->configuracion->First();
		$data = [
			'titulo' => 'Usuarios', 'datos' => $ventas,
			'boletas' => $boletas, 'facturas' => $facturas,
			'configuracion' => $configuracion
		];

		$estados = [
			'e_venta' => 'active',
			'e_producto' => '',
			'e_ordencompra' => '',
			'e_usuario' => '',
			'e_notacredito' => '',
			'e_config' => '',
			'e_estadistica' => ''
		];

		echo view('header', $data);
		echo view('administrador/panel_header', $estados);
		echo view('administrador/ventas', $test);
		echo view('administrador/panel_footer');
		echo view('footer', $data);
	}

	public function despachoString($valor)
	{
		switch ($valor) {
			case 0:
				return 'No';
			case 1:
				return 'Si';
		}
	}

	public function estadoVentaString($valor)
	{
		switch ($valor) {
			case 0:
				return 'Anulada';
			case 1:
				return 'Realizada';
			default:
				return 'configurar';
		}
	}

	public function boton()
	{
		$accion = function ($row) {
			return '<button class="boton-accion" data-id="' . $row["id_venta"] . '><i class="fa fa-bars"></i></button><br>';
		};
		return 'f';
	}

	public function buscarId($id)
	{

		$venta = $this->categorias->where('id_venta', $id)->first();
		return $venta;
	}

	public function anularVenta($id_venta = 1002)
	{
		$this->ventas->select('*');
		$this->ventas->where('id_venta', $id_venta);
		$datos = $this->ventas->get()->getRow();
		(isset($tester)) ? print_r($tester) : print_r('Sin datos');
		$res['datos'] = '';

		if ($datos) {
			$res['datos'] = $datos;
			$res['error'] = 'No Error';
		} else {
			$res['error'] = 'Error';
		}

		echo json_encode($res);

		/*
        $request = $this->request = \Config\Services::request();
		
		echo $request->getVar('id_venta');
		echo 'TEEST0';
		$id_venta = $this->input->post("id_venta");
		if($id_venta != null) {
			$data = $this->ventas->buscarId($id_venta);
	  
		  header('Content-Type: application/json');
		  echo json_encode($data);
		}
		
		$id_venta = 1002;
		echo json_encode($id_venta);
		$id = $this->input->post('id');
		echo $id;
		
        $request = $this->request = \Config\Services::request();
		
		echo $request->getVar('id_venta');
		if($request->getVar('id_venta')){
			$id_venta = $request->getVar('id_venta');
			$venta = $this->ventas->where('id_venta', $id_venta);
			$venta['estado_venta'] = 0;
			$this->ventas->update($id_venta,$venta);

			echo json_encode($id_venta);

			#$this->ventas->where('id_venta', $id_venta)->update($id_venta,['estado_venta' => 0]);

			echo 'div class="alert alert-success"></div>';


			#$venta = $this->ventas->update($id_venta,['estado_venta' => 0]);
		}
		*/
		/*
		$venta = $this->ventas->where('id_venta',$id)->First();
		echo 'teste';
		$venta = $this->ventas->update($id,['estado_venta' => 0]);
		return $venta;
		*/
		#return $this->response->redirect(site_url('/ventas'));
		/*echo view('header');
		echo view('administrador/panel_header');
		echo view('administrador/ventas');
		echo view('administrador/panel_footer');
		echo view('footer');*/
	}

	function obtenerUltimoId()
	{
		$resultado = $this->ventas->select('id_venta,fecha_venta')->orderBy('id_venta', 'DESC')->first();
		return $resultado;
	}


	function realizarVentaWeb()
	{

		$this->request = \Config\Services::request();
		date_default_timezone_set("America/Santiago");

		$valores_venta = $this->calcularValores($this->request->getVar('total_venta_web'));

		$this->ventas->save([
			'tipo_comprobante' => $this->request->getVar('tipo_comprobante'),
			'fecha_venta' => date('Y-m-d H:i:s'),
			'valor_neto' => $valores_venta['valor_neto'],
			'valor_iva' => $valores_venta['iva'],
			'total' => $valores_venta['total'],
			'despacho' => $this->request->getVar('despacho'),
			'estado_venta' => 1,
			'empleado_fk' => 301,
			'cliente_fk' => $this->request->getVar('cliente_fk'),
			'forma_pago_fk' => 2,
		]);
		if ($this->request->getVar('despacho') == 1) {
			$ultimoId = $this->obtenerUltimoId();
			$ui = $ultimoId['id_venta'];
			$costo_com = $this->costoComuna->obtenerCostoId($this->request->getVar('comuna_fk'));
			$cc = $costo_com['id_costo'];
			$costo_desp = str_replace('$', '', $this->request->getVar('costo'));
			$this->desp->insertarDespacho(
				$this->request->getVar('nom_recibe'),
				$this->request->getVar('telefono'),
				$costo_desp,
				$ui,
				$cc
			);
		}
		$ultima_venta = $this->ventas->orderBy('id_venta', 'DESC')->first();
		return ($ultima_venta['id_venta']);
	}

	function agregarDetalleVenta()
	{
		$this->request = \Config\Services::request();

		$ultima_venta = $this->ventas->orderBy('id_venta', 'DESC')->first();
		$id_venta_pk = $this->request->getVar('ultima_venta');

		$productos = $this->request->getVar('arrayProductosDetalle');

		foreach ($productos as $key => $producto) {
			$this->detalle_venta->save([
				'id_producto_pk' => $producto[0],
				'id_venta_pk' => $id_venta_pk,
				'cantidad' => $producto[1]
			]);
		}
	}

	function calcularValores($total)
	{

		$tv = str_replace('$', '', $total);
		$total_venta = str_replace('.', '', $tv);
		$total_iva = $total_venta * 0.19;
		$total_neto = $total_venta - $total_iva;
		$valores = [
			'valor_neto' => round($total_neto),
			'iva' => round($total_iva),
			'total' => $total_venta
		];
		return $valores;
	}


	public function datosBoleta($id_venta)
	{
		$this->ventas->select('id_venta, fecha_venta, CONCAT(d.rut, "-",d.dv) AS rut, CONCAT(d.nombres, " ",d.apellidos) AS nombres,total');
		$this->ventas->join('usuario AS u', 'venta.cliente_fk=u.id_usuario');
		$this->ventas->join('datos_personales AS d', 'u.rut_fk=d.rut');
		$this->ventas->where('id_venta', $id_venta);
		$datos = $this->ventas->first();
		$res['datos'] = $datos;
		return json_encode($res);
	}

	public function datosProductoBoleta($id_venta)
	{
		$this->ventas->select('p.nombre AS nombre, dt.cantidad AS cantidad, id_venta, fecha_venta, (cantidad * (p.precio_venta - (p.precio_venta * 0.19))) AS precio_neto, total, (valor_neto+valor_iva) AS costo,
		(p.precio_venta * cantidad) AS precio_venta,(cantidad * (p.precio_venta * 0.19)) AS precio_iva');
		$this->ventas->join('detalle_venta AS dt', 'venta.id_venta=dt.id_venta_pk');
		$this->ventas->join('producto AS p', 'dt.id_producto_pk=p.id_producto');
		$this->ventas->where('id_venta', $id_venta);
		$this->ventas->groupBy('nombre');
		$datos = $this->ventas->findAll();
		$res['datos'] = $datos;
		return json_encode($res);
	}


	public function pagComprobante()
	{
		$configuracion = $this->configuracion->First();
		$data = [
			'configuracion' => $configuracion
		];
		$estados = [
			'e_venta' => '',
			'e_producto' => 'active',
			'e_ordencompra' => '',
			'e_usuario' => '',
			'e_notacredito' => '',
			'e_config' => '',
			'e_estadistica' => ''
		];

		echo view('header', $data);
		echo view('administrador/Comprobante');
		echo view('footer');
	}

	function obtenerUltimoIdCom()
	{
		$ultima_venta = $this->ventas->select('id_venta')->orderBy('id_venta', 'DESC')->first();
		return $ultima_venta;
	}


	public function datosProductoBoletaUser()
	{
		$a = $this->obtenerUltimoIdCom();
		$e = $a['id_venta'];
		$this->request = \Config\Services::request();
		$this->ventas->select('p.nombre AS nombre,dv.cantidad AS cantidad,(cantidad * (p.precio_venta - (p.precio_venta * 0.19))) AS precio_neto,
		(cantidad * (p.precio_venta * 0.19)) AS precio_iva, (p.precio_venta * cantidad) AS precio_venta');
		$this->ventas->join('detalle_venta AS dv', 'venta.id_venta=dv.id_venta_pk');
		$this->ventas->join('usuario AS u', 'venta.cliente_fk=u.id_usuario');
		$this->ventas->join('producto AS p', 'dv.id_producto_pk=p.id_producto');
		$this->ventas->where('id_venta', $e);
		$this->ventas->groupBy('nombre');
		return $this->ventas->findAll();
	}
  
  
	public function datosPersoUser()
	{
		$this->ventas->select('id_venta,cliente_fk,fecha_venta,CONCAT(u.rut_fk,"-", d.dv) AS rut, CONCAT(d.nombres,"-",d.apellidos) AS nombres');
		$this->ventas->join('usuario AS u', 'venta.cliente_fk=u.id_usuario');
		$this->ventas->join('datos_personales AS d', 'u.rut_fk=d.rut');
		$this->ventas->orderBy('id_venta, fecha_venta', 'DESC');
		return $this->ventas->where('id_usuario', $this->session->id_usuario)->first();
	}
	public function cargartoComprobante()
	{
		$this->request = \Config\Services::request();
		$this->response = \Config\Services::response();
		$datosUser = $this->datosPersoUser();
		$pdf = new \FPDF('P', 'mm', 'letter');
		$pdf->AddPage();
		$pdf->SetMargins(30, 10, 10);
		$pdf->SetTitle("Stock criticos");
		$pdf->SetFont("Arial", 'B', 10);
		$pdf->Image("img/logo/logo1.png", 150, 7);
		$pdf->Cell(50, 5, utf8_decode("Datos de la venta N°"), 0, 1, 'C');
		$pdf->Cell(10, 5, utf8_decode($datosUser['id_venta']), 0, 1, "C");
		$pdf->Ln(10);
		$pdf->Cell(7, 5, utf8_decode("Detalle de la venta:"), 0, 1, 'C');
		$pdf->Ln(10);
		$pdf->Cell(5, 5, utf8_decode("Fecha de emision:"), 0, 1, 'C');
		$pdf->Cell(5, 5, $datosUser['fecha_venta'], 0, 1, "C");
		$pdf->Ln(10);
		$pdf->Cell(-6, 5, utf8_decode("Rut cliente:"), 0, 1, "C");
		$pdf->Cell(-6, 5, $datosUser['rut'], 0, 1, 'C');
		$pdf->Ln(10);
		$pdf->Cell(-6, 5, utf8_decode("Nombre cliente:"), 0, 1, 'C');
		$pdf->Cell(-6, 5, $datosUser['nombres'], 0, 1, 'C');
		$pdf->Ln(10);
		$datosProductos = $this->datosProductoBoletaUser();
		foreach ($datosProductos as $product) {
			$pdf->Ln();
			$pdf->Cell(5, 5, $product['nombre'], 0, 1, "C");
			$pdf->Cell(5, 5, $product['cantidad'], 0, 1, "C");
			$pdf->Cell(5, 5, $product['precio_neto'], 0, 1, "C");
			$pdf->Cell(5, 5, $product['precio_iva'], 0, 1, "C");
			$pdf->Cell(5, 5, $product['precio_venta'], 0, 1, "C");
		}


		$this->response->setHeader('Content-Type', 'application/pdf');


	public function datosPersoUser()
    {
        $this->ventas->select('id_venta,cliente_fk,fecha_venta,CONCAT(u.rut_fk,"-", d.dv) AS rut, CONCAT(d.nombres,"-",d.apellidos) AS nombres');
        $this->ventas->join('usuario AS u', 'venta.cliente_fk=u.id_usuario');
        $this->ventas->join('datos_personales AS d', 'u.rut_fk=d.rut');
        return $this->ventas->where('id_usuario', $this->session->id_usuario)->first();
    }

	public function cargartoComprobante()
	{
		$this->response = \Config\Services::response();
		$datosUser = $this->datosPersoUser();

		$pdf = new \FPDF('P', 'mm', 'letter');
		$pdf->AddPage();
		$pdf->SetMargins(30, 10, 10);
		$pdf->SetTitle("Stock criticos");
		$pdf->SetFont("Arial", 'B', 10);
		$pdf->Image("img/logo/logo1.png", 150, 7);
		$pdf->Cell(50, 5, utf8_decode("Datos de la venta N°"), 0, 1, 'C');
		$pdf->Cell(10, 5, $datosUser['id_venta'], 0, 1, "C");
		$pdf->Ln(10);
		$pdf->Cell(7, 5, utf8_decode("Detalle de la venta:"), 0, 1, 'C');
		$pdf->Ln(10);
		$pdf->Cell(5, 5, utf8_decode("Fecha de emision:"), 0, 1, 'C');
		$pdf->Cell(5, 5, $datosUser['fecha_venta'], 0, 1, "C");
		$pdf->Ln(10);
		$pdf->Cell(-6, 5, utf8_decode("Rut cliente:"), 0, 1, "C");
		$pdf->Cell(-6, 5, $datosUser['rut'], 0, 1, 'C');
		$pdf->Ln(10);
		$pdf->Cell(-6, 5, utf8_decode("Nombre cliente:"), 0, 1, 'C');
		$pdf->Cell(-6, 5, $datosUser['nombres'], 0, 1, 'C');
		$pdf->Ln(10);
		$datosProductos = $this->datosProductoBoletaUser();
		foreach ($datosProductos as $product) {
			$pdf->Ln();
			$pdf->Cell(5, 5, $product['nombre'], 0, 1, "C");
		}

		$this->response->setHeader('Content-Type', 'application/pdf');

		$pdf->Output('comprobante.pdf', 'I');
	}

}
