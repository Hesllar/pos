<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmpresaModel;
use App\Models\DireccionModel;

class Empresas extends BaseController
{
	protected $empresas;
	protected $direccion;

	public function __construct()
	{
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
		return json_encode(array_merge($empresa,$direccion));
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
		return $resultado;
	}
	
}
