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

	public function __construct()
	{
		$this->ventas = new VentaModel;
		$this->empresas = new EmpresaModel;
		$this->direccion = new DireccionModel;
	}

	public function index()
	{
	}

	public function buscarPorRutCliente($rut_cliente)
	{
		$empresa = $this->empresas->where('DATOS_PERSONALES_rut', $rut_cliente)->first();
		$direccion = $this->direccion->select()->where('id_direccion', $empresa['direccion_empresa'])->First();
		return json_encode(array_merge($empresa, $direccion));
	}

	public function boolClienteEmpresa($rut_cliente)
	{
		$resultado = [
			'existe' => 'false'
		];
		$empresa = $this->empresas->where('DATOS_PERSONALES_rut', $rut_cliente)->first();
		if ($empresa) {
			$resultado = [
				'existe' => 'true'
			];
		}
		return json_encode($resultado);
	}

	public function datosEmp($id_venta)
	{
		$this->ventas->select('CONCAT(em.rut_empresa,"-" ,em.dvempresa) AS rut_emp ,em.razon_social AS social,em.giro AS giro');
		$this->ventas->join('usuario AS u', 'venta.cliente_fk=u.id_usuario');
		$this->ventas->join('datos_personales AS d ', 'u.rut_fk=d.rut');
		$this->ventas->join('empresa AS em', 'd.rut=em.DATOS_PERSONALES_rut');
		$this->ventas->where('id_venta', $id_venta);
		$datos = $this->ventas->first();

		$res['datos'] = $datos;
		return json_encode($res);
	}
}
