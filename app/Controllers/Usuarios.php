<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use App\Models\ConfiguracionModel;

class Usuarios extends BaseController
{
	protected $usuarios;

	public function __construct()
	{
		$this->usuarios = new UsuarioModel;
		$this->configuracion = new ConfiguracionModel;
	}

	public function index()
	{
		$configuracion = $this->configuracion->First();
		$data = ['titulo' => 'Usuarios', 'configuracion' => $configuracion];

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
		echo view('footer', $data);
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
}
