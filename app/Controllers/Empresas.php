<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmpresaModel;
use App\Models\DireccionModel;
use App\Models\VentaModel;



class Empresas extends BaseController
{
	protected $empresas;
	protected $direccion;
	protected $ventas;
	protected $request;

	public function __construct()
	{
		$this->ventas = new VentaModel;
		$this->empresas = new EmpresaModel;
		$this->direccion = new DireccionModel;
	}

	public function index()
	{
	}

	public function pruebaRutEmp($rut_cliente)
	{

		$empresa = $this->empresas->where('DATOS_PERSONALES_rut', $rut_cliente)->first();

		$data['datos'] = $empresa;

		return json_encode($data);
	}

	public function buscarPorRutCliente($rut_cliente)
	{
		$empresa = $this->empresas->where('DATOS_PERSONALES_rut', $rut_cliente)->first();
		$direccion = $this->direccion->select()->where('id_direccion', $empresa['direccion_empresa'])->First();
		return json_encode(array_merge($empresa, $direccion));
	}

	public function buscarPorRutEmpresa($rut_empresa)
	{
		$empresa = $this->empresas->where('rut_empresa', $rut_empresa)->first();
		return json_encode($empresa);
	}

	public function boolClienteEmpresa($rut_cliente)
	{
		$resultado = false;
		$empresa = $this->empresas->where('DATOS_PERSONALES_rut', $rut_cliente)->first();
		if ($empresa) {
			$resultado = true;
		}
		return json_encode($resultado);
	}

	public function datosEmp($id_venta)
	{
		$this->ventas->select('CONCAT(em.rut_empresa, "-",em.dvempresa) AS rut_emp ,em.razon_social AS social,em.giro AS giro');
		$this->ventas->join('usuario AS u', 'venta.cliente_fk=u.id_usuario');
		$this->ventas->join('datos_personales AS d ', 'u.rut_fk=d.rut');
		$this->ventas->join('empresa AS em', 'd.rut=em.DATOS_PERSONALES_rut');
		$this->ventas->where('id_venta', $id_venta);
		$datos = $this->ventas->first();

		$res['datos'] = $datos;
		return json_encode($res);
	}

	public function agregarEmpresa()
	{
		$dr = $this->direccion->orderBy('id_direccion', 'DESC')->First();
		$this->request = \Config\Services::request();
		$rutC = $this->request->getPost('rut_c');
		$rut = $this->request->getPost('rut_e');
		$dv = $this->request->getPost('dv_e');
		$razon = $this->request->getPost('r_e');
		$giro = $this->request->getPost('g_e');
		$tel = $this->request->getPost('t_e');

		$this->empresas->save([
			'rut_empresa' => $rut,
			'dvempresa' => $dv,
			'razon_social' => $razon,
			'giro' => $giro,
			'telefono' => $tel,
			'DATOS_PERSONALES_rut' => $rutC,
			'direccion_empresa' => $dr['id_direccion']
		]);

		return json_encode($this->request->getPost('rut_e'));
	}
}
