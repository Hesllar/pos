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

class Ventas extends BaseController
{
	protected $ventas;
	protected $request;

	public function __construct()
	{
		$this->usuarios = new Usuarios;
		$this->empleados = new Empleados;
		$this->formapago = new FormaPago;
		$this->costoComuna = new Comuna;
		$this->desp = new Despachos;

		
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
		$resultado = $this->ventas->select('id_venta')->orderBy('id_venta','DESC')->first();
		return $resultado;
	}

	function realizarVentaWeb(){
		
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
		if($this->request->getVar('despacho') == 1){
			$ultimoId = $this->obtenerUltimoId();
			$ui = $ultimoId['id_venta'];
			$costo_com = $this->costoComuna->obtenerCostoId($this->request->getVar('comuna_fk'));
			$cc = $costo_com['id_costo'];
			$costo_desp = str_replace('$', '',$this->request->getVar('costo')) ;
			$this->desp->insertarDespacho(
			 $this->request->getVar('nom_recibe'),
             $this->request->getVar('telefono'),
             $costo_desp,
             $ui,
             $cc
			);
		}

		

	}

	function agregarDetalleVenta(){
		$this->request = \Config\Services::request();

		$ultima_venta = $this->ventas->orderBy('id_venta','DESC')->first();
		$id_venta_pk = $ultima_venta['id_venta'] + 1;

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

		$tv = str_replace('$', '',$total) ;
		$total_venta = str_replace('.', '',$tv);
		$total_iva = $total_venta * 0.19;
		$total_neto = $total_venta - $total_iva;
		$valores = [
			'valor_neto' => round($total_neto),
			'iva' => round($total_iva),
			'total' => $total_venta
		];
		return $valores;
	}

	function testId(){
		$tt = $this->ventas->orderBy('id_venta','DESC')->first();
		return json_encode($tt['id_venta']);
	}


}
