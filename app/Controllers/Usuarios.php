<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\DatosPersonales;
use App\Models\UsuarioModel;
use App\Models\ConfiguracionModel;
use App\Models\DatosPersonalesModel;
use App\Models\NivelAccesoModel;
use App\Models\RegionModel;
use App\Models\ComunaModel;



class Usuarios extends BaseController
{
	protected $nivel;
	protected $region;
	protected $usuarios;
	protected $datosPersonales;
	protected $datosPersonalesControl;
	protected $comuna;
	protected $request;


	public function __construct()
	{

		$this->datosPersonalesControl = new DatosPersonales;
		$this->comuna = new ComunaModel;
		$this->region = new RegionModel;
		$this->nivel = new NivelAccesoModel();
		$this->datosPersonales = new DatosPersonalesModel;
		$this->usuarios = new UsuarioModel;
		$this->configuracion = new ConfiguracionModel;
	}

	public function index()
	{
		$nvl_acceso = $this->nivel->findAll();
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

	public function pagNuevoUsuario()
	{

		$comuna = $this->comuna->findAll();
		$nvl_acceso = $this->nivel->findAll();
		$region = $this->region->findAll();
		$usuario = $this->usuarios->DatosPersonales();
		$configuracion = $this->configuracion->First();
		$data = [
			'titulo' => 'Usuarios',
			'configuracion' => $configuracion,
			'usuarios' => $usuario,
			'nvl_acceso' => $nvl_acceso,
			'region' => $region,
			'comuna' => $comuna
		];
		echo view('header', $data);
		echo view('administrador/Registro_usuario');
		echo view('footer');
	}

	public function insertar()
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
			$this->request->getPost('nombre_usuario'),
			$this->request->getPost('apellidos'),
			$this->request->getPost('email'),
			$this->request->getPost('celular'),
			$this->request->getPost('juridico')
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
			$img->move('img/Usuarios', $newName);
		}
		$this->usuarios->save([
			'nom_usuario' => $this->request->getPost('nom_usuario'),
			'contrasena' => $this->request->getPost('contraseña2'),
			'estado_usuario' => 1,
			'avatar' => $newName,
			'nvl_acceso_fk' => $this->request->getPost('nivel_acceso'),
			'rut_fk' =>  $this->request->getPost('rut')
		]);
		return redirect()->to(base_url() . '/Usuarios');
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

	/*public function insertarNvl($id)
	{
		$this->nivel->save(['nivel_acceso' => $id]);
	}
	public function buscarIdNvl()
	{
		$buscarid =  $this->nivel_acceso->orderBy('id_nivel', 'DESC')->First();
		return $buscarid['id_nivel'];
	}



	public function guardarComuna($id)
	{
		$this->request = \Config\Services::request();
		$this->region->guardarRegion(
			$this->request->getPost('region_fk')
		);
		$this->comuna->save([
			'nombre_comuna' => $id
		]);
	}
	public function guardarRegion($id)
	{
		$this->region->save([
			'nombre_region' => $id
		]);
	}*/
}
