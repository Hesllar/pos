<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfiguracionModel;
use App\Models\UsuarioModel;

class Acceder extends BaseController
{
	protected $configuracion;
	protected $request;
	protected $usuarioModal;
	protected $reglasLogin;

	public function __construct()
	{
		$this->configuracion = new ConfiguracionModel;
		$this->usuarioModal = new UsuarioModel;
		$this->reglasLogin = [
			'nom_usuario' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'el campo {filed} es obligatorio.'
				]
			],
			'contrasena' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'el campo {filed} es obligatorio.'
				]
			]

		];
	}

	public function index()
	{
		$configuracion = $this->configuracion->First();
		$data = ['configuracion' => $configuracion];
		echo view('header', $data);
		echo view('acceder');
		echo view('footer');
	}




	public function valida()
	{
		$configuracion = $this->configuracion->First();
		$this->request = \Config\Services::request();

		if ($this->request->getMEthod() == "post" && $this->validate($this->reglasLogin)) {
			$nom_usuario = $this->request->getPost('nom_usuario');
			$contraseña = $this->request->getPost('contrasena');
			$datosUsuario = $this->usuarioModal->where('nom_usuario', $nom_usuario)->first();
			if ($datosUsuario != null && $datosUsuario['estado_usuario'] == 1) {
				if (password_verify($contraseña, $datosUsuario['contrasena'])) {
					$datosSesion = [
						'id_usuario' => $datosUsuario['id_usuario'],
						'nom_usuario' => $datosUsuario['nom_usuario'],
						'contrasena' => $datosUsuario['contrasena'],
						'estado_usuario' => $datosUsuario['estado_usuario'],
						'avatar' => $datosUsuario['avatar'],
						'ultima_conexion' => $datosUsuario['ultima_conexion'],
						'rut_fk' => $datosUsuario['rut_fk'],
						'nvl_acceso_fk' => $datosUsuario['nvl_acceso_fk'],
					];
					$data = ['titulo' => 'Validar', 'datos' => $datosSesion, 'configuracion' => $configuracion];
					$session = session();
					$session->set($datosSesion);
					if ($datosUsuario['nvl_acceso_fk'] == 10) {
						return redirect()->to(base_url() . '/productosadmin');
					} elseif ($datosUsuario['nvl_acceso_fk'] == 20) {
						return redirect()->to(base_url() . '/proveedor');
					} elseif ($datosUsuario['nvl_acceso_fk'] == 30) {
						return redirect()->to(base_url() . '/#');
					} elseif ($datosUsuario['nvl_acceso_fk'] == 40) {
						return redirect()->to(base_url() . '/productos');
					} elseif ($datosUsuario['nvl_acceso_fk'] == 50) {
						return redirect()->to(base_url() . '/#');
					}
				} else {
					$data1 = ['configuracion' => $configuracion];
					$data['error'] = "la contraseña esta incorrecta";
					echo view('header', $data1);
					echo view('acceder', $data);
					echo view('footer');
				}
			} else {

				$data1 = ['configuracion' => $configuracion];
				$data['error'] = "El usuario no existe";
				echo view('header', $data1);
				echo view('acceder', $data);
				echo view('footer');
			}
		} else {
			$data1 = ['configuracion' => $configuracion];
			$data = ['validaition' => $this->validator];
			echo view('header', $data1);
			echo view('acceder', $data);
			echo view('footer');
		}
	}
	public function olvide_contrasena()
	{
		$session = session();
		$usuario = $this->usuarioModal->where('id_usuario', $session->id_usuario)->first();
		$configuracion = $this->configuracion->First();
		$data = ['configuracion' => $configuracion, 'usuario' => $usuario];
		echo view('header', $data);
		echo view('olvide_contrasena');
		echo view('footer');
	}


	public function perfil($id_user)
	{
		$this->usuarioModal->select('rut,dv,nombres,apellidos,celular,correo,natural_juridico,d.ciudad AS ciudad,
		r.nombre_region AS region, c.nombre_comuna AS comuna, d.calle AS calle, d.numero AS numero, nom_usuario');
		$this->usuarioModal->join('datos_personales AS dt', 'usuario.rut_fk=dt.rut');
		$this->usuarioModal->join('direccion AS d', 'dt.direccion_fk=d.id_direccion');
		$this->usuarioModal->join('comuna AS c', 'd.comuna_fk=c.id_comuna');
		$this->usuarioModal->join('region AS r', 'c.region_fk=r.id_region');
		$this->usuarioModal->where('id_usuario', $id_user);
		$datos = $this->usuarioModal->first();

		$res['datos'] = $datos;

		return json_encode($res);
	}

	public function datosEmp($id_user)
	{
		$this->usuarioModal->select('e.rut_empresa AS rut_emp, e.razon_social AS razon, e.giro AS giro, e.telefono AS fono, e.dvempresa AS dv_emp');
		$this->usuarioModal->join('datos_personales AS dt', 'usuario.rut_fk=dt.rut');
		$this->usuarioModal->join('empresa AS e', 'dt.rut=e.DATOS_PERSONALES_rut');
		$this->usuarioModal->where('id_usuario', $id_user);
		$datos = $this->usuarioModal->first();

		$res['datos'] = $datos;
		return json_encode($res);
	}
}
