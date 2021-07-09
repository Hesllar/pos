<?php

namespace App\Controllers;

use App\Models\EmpleadoModel;

class Empleados extends BaseController
{	
	protected $empleados;

	public function __construct()
	{
		$this->empleados = new EmpleadoModel;
	}

	public function index()
	{

	}

	public function listar()
	{
		$empleados = $this->empleados->FindAll();
		return $empleados;
	}

	public function buscarPorId($id_empleado)
	{
		$empleados = $this->empleados->where('id_empleado',$id_empleado)->First();
		return $empleados;
	}

	public function buscarPorIdUsuario($id_usuario)
	{
		$empleados = $this->empleados->where('usuario_fk',$id_usuario)->First();
		return $empleados['id_empleado'];
	}
	
}
