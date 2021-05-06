<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class Usuarios extends BaseController
{
	protected $usuarios;

	public function __construct()
	{
		$this->usuarios = new UsuarioModel;
	}

	public function index()
	{
		$usuarios = $this->usuario->findAll();
		$data = ['titulo' => 'Usuarios', 'datos' => $usuarios];

		echo view('header');
		echo view('administrador/panel');
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
}
