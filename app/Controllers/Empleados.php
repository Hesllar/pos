<?php

namespace App\Controllers;

use App\Models\EmpleadoModel;
use App\Models\DatosPersonalesModel;
use App\Models\UsuarioModel;

class Empleados extends BaseController
{	
	protected $empleados;
	protected $datosPersonales;
	protected $usuarios;

	public function __construct()
	{
		$this->empleados = new EmpleadoModel;
		$this->datosPersonales = new DatosPersonalesModel;
		$this->usuarios = new UsuarioModel;
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

	public function buscarNombrePorId($id_empleado)
	{
		$empleado = $this->empleados->where('id_empleado',$id_empleado)->First();
		$usuario = $this->usuarios->where('id_usuario', $empleado['usuario_fk'])->First();
		$dt = $this->datosPersonales->where('rut', $usuario['rut_fk'])->First();
		return $dt['nombres'] . ' ' . $dt['apellidos'];
	}

	public function buscarPorIdUsuario($id_usuario)
	{
		$empleados = $this->empleados->where('usuario_fk',$id_usuario)->First();
		return $empleados['id_empleado'];
	}
	
}
