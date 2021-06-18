<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RegionModel;
use App\Controllers\DatosPersonales;
use App\Models\UsuarioModel;
use App\Models\ConfiguracionModel;
use App\Models\DatosPersonalesModel;
use App\Models\DireccionModel;
use App\Models\EmpresaModel;



class Registro extends BaseController
{
	protected $empresa;
	protected $region;
	protected $configuracion;
	protected $request;
	protected $direccion;
	protected $usuarioModal;
	protected $datosPersonales;
	protected $datosPersonalesControl;

	public function __construct()
	{

		$this->empresa = new EmpresaModel;
		$this->region = new RegionModel;
		$this->configuracion = new ConfiguracionModel;
		$this->direccion = new DireccionModel;
		$this->datosPersonalesControl = new DatosPersonales;
		$this->datosPersonales = new DatosPersonalesModel;
		$this->usuarioModal = new UsuarioModel;
	}

	public function index()
	{
		$regionAll = $this->region->findAll();
		$configuracion = $this->configuracion->First();
		$data = ['configuracion' => $configuracion, 'region' => $regionAll];
		echo view('header', $data);
		echo view('registro');
		echo view('footer');
	}
	public function registroUsuario()
	{
		$this->request = \Config\Services::request();
		//Acá la funciones insertarNvl obtiene el nivel de acceso y lo guarda en su respectiva tabala
		/*$this->nivel->insertarNvl([
			$this->request->getPost('nivel_acceso')
		]);*/



		//Acá se obtienen los datos de la tabla direccion
		$this->datosPersonalesControl->insertarDireccion(
			$this->request->getPost('ciudad'),
			$this->request->getPost('calle'),
			$this->request->getPost('numero'),
			$this->request->getPost('comuna')
		);

		//Acá la funciones insertarDatosPerso obtiene todos los campos y lo guarda en su respectiva tabala
		$this->datosPersonalesControl->insertarDatosPerso(
			$this->request->getPost('rut'),
			$this->request->getPost('dv'),
			$this->request->getPost('nombre'),
			$this->request->getPost('apellidos'),
			$this->request->getPost('email'),
			$this->request->getPost('celular'),
			$this->request->getPost('juridico'),

		);

		//Acá insertamos los datos a la tabla usuario

		$validacion = $this->validate([
			'imagen' => [
				'uploaded[imagen]',
				'max_size[imagen, 4096]'
			]
		]);

		if ($validacion) {

			$img = $this->request->getFile('imagen');
			$newName = $img->getName();
			$img->move('img/Usuarios/Clientes', $newName);
		}
		$hash = password_hash($this->request->getPost('contraseña'), PASSWORD_DEFAULT);
		//Acá insertamos los datos a la tabla usuario
		$this->usuarioModal->save([
			'nom_usuario' => $this->request->getPost('nombre_usuario'),
			'contrasena' => $hash,
			'estado_usuario' => 1,
			'avatar' => $newName,
			'nvl_acceso_fk' => 40,
			'rut_fk' =>  $this->request->getPost('rut'),
			'id_sucursal_fk' => 3
		]);

		//Acá insertamos los datos a la tabla empresa
		if ($this->request->getPost('juridico') == 1) {
			$this->empresa->save([
				'rut_empresa' => $this->request->getPost('rut_emp'),
				'dvempresa' => $this->request->getPost('dv_emp'),
				'razon_social' => $this->request->getPost('razon'),
				'giro' => $this->request->getPost('giro'),
				'telefono' => $this->request->getPost('telefono'),
				'DATOS_PERSONALES_rut' =>  $this->request->getPost('rut'),
				'direccion_empresa' => $this->datosPersonalesControl->buscarIdDireccion()
			]);
		}

		return redirect()->to(base_url() . '/Acceder');
	}
}
