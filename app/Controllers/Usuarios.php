<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use App\Models\ConfiguracionModel;
use App\Models\DatosPersonalesModel;
use App\Models\NivelAccesoModel;
use App\Models\RegionModel;


class Usuarios extends BaseController
{
	protected $nivel_acceso;
	protected $region;
	protected $usuarios;
	protected $datosPersonales;

	public function __construct()
	{
		$this->region = new RegionModel;
		$this->nivel_acceso = new NivelAccesoModel;
		$this->datosPersonales = new DatosPersonalesModel;
		$this->usuarios = new UsuarioModel;
		$this->configuracion = new ConfiguracionModel;
	}

	public function index()
	{
		$nvl_acceso = $this->nivel_acceso->findAll();
		$region = $this->region->findAll();
		$usuario = $this->usuarios->DatosPersonales();
		$configuracion = $this->configuracion->First();

		$data = [
			'titulo' => 'Usuarios',
			'configuracion' => $configuracion,
			'usuarios' => $usuario,
			'nvl_acceso' => $nvl_acceso,
			'region' => $region
		];

		$estados = [
			'e_venta' => '',
			'e_producto' => '',
			'e_ordencompra' => '',
			'e_usuario' => 'active',
			'e_notacredito' => '',
			'e_config' => ''
		];

		echo view('header', $data);
		echo view('administrador/panel_header', $estados);
		echo view('administrador/usuarios');
		echo view('administrador/panel_footer');
		echo view('footer');
	}

	public function insertar()
	{/*
		$this->usuarios->save(['nom_usuario' => $this->request->getPost('nom_usuario'),
							'contrasena' => $this->request->getPost('contrasena'),
							'estado_usuario' => $this->request->getPost('estado_usuario'),
							'avatar' => $this->request->getPost('avatar'),
							'ultima_conexion' => $this->request->getPost('ultima_conexion'),
							'nivel_acceso_fk' => $this->request->getPost('nivel_acceso_fk'),
							'rut_fk' => $this->request->getPost('rut_fk')
							]);
		return redirect()->to(base_url().'usuarios');
		*/
	}

	public function listar()
	{
		$usuarios = $this->usuarios->FindAll();
		return $usuarios;
	}

	public function buscarPorId($id_usuario)
	{
		$usuarios = $this->usuarios->where('id_usuario', $id_usuario)->First();
		return $usuarios;
	}

	public function buscarPorRut($rut_fk)
	{
		$usuarios = $this->usuarios->where('rut_fk', $rut_fk)->First();
		return $usuarios;
	}
}
