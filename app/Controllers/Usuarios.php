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
use App\Models\DireccionModel;




class Usuarios extends BaseController
{
	protected $nivel;
	protected $direccion;
	protected $region;
	protected $usuarios;
	protected $datosPersonales;
	protected $datosPersonalesControl;
	protected $comuna;
	protected $request;
	protected $reglas;


	public function __construct()
	{

		$this->direccion = new DireccionModel;
		$this->datosPersonalesControl = new DatosPersonales;
		$this->comuna = new ComunaModel;
		$this->region = new RegionModel;
		$this->nivel = new NivelAccesoModel();
		$this->datosPersonales = new DatosPersonalesModel;
		$this->usuarios = new UsuarioModel;
		$this->configuracion = new ConfiguracionModel;
		helper(['form']);
		/*$this->reglas1 = [
			'imagen' => 'required',
			'nom_usuario' => 'required',
			'contrasena' => 'required',
			'rut' => 'required',
			'nombres' => 'required',
			'apellidos' => 'required',
			'celular' => 'required',
			'natural_juridico' => 'required',
			'correo' => 'required',
			'nivel_acceso_fk' => 'required'

		];*/
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
		//if ($this->request->getMethod() == "post" && $this->validate($this->reglas1)) {
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
		/*} else {
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
				'comuna' => $comuna,
				'validation' => $this->validator
			];
			echo view('header', $data);
			echo view('administrador/Registro_usuario');
			echo view('footer');
		}*/
	}

	public function editarUsuario($id, $valid = null)
	{
		$usuario = $this->usuarios->where('id_usuario', $id)->first();
		$comunaAll = $this->comuna->findAll();
		$regionAll = $this->region->findAll();
		$datos_perso = $this->obtnDatos($usuario['rut_fk']);
		$nivel_fk = $this->buscarIdNvl($usuario['nvl_acceso_fk']);
		$nive_all = $this->nivel->findAll();
		$configuracion = $this->configuracion->First();
		if ($valid != null) {

			$data = [
				'datos' => $usuario, 'configuracion' => $configuracion,
				'validation' => $valid, 'nivel_fk' => $nivel_fk, 'nivel_all' => $nive_all, 'dtsPerso' => $datos_perso,
				'comunaAll' => $comunaAll, 'region' => $regionAll
			];
		} else {
			$data = [
				'datos' => $usuario, 'configuracion' => $configuracion, 'nivel_fk' => $nivel_fk, 'nivel_all' => $nive_all,
				'dtsPerso' => $datos_perso, 'comunaAll' => $comunaAll, 'region' => $regionAll
			];
		}

		#$this->load->view('administrador/productos_admin', $data);
		echo view('header', $data);
		echo view('administrador/editar_usuario');
		echo view('footer');
	}

	public function actualizar()
	{

		$this->request = \Config\Services::request();

		$this->detalle_producto->actualizarFecha(
			$this->request->getPost('id_detalle'),
			$this->request->getPost('fecha_vencimiento')
		);

		if (($this->request->getFile('imagen')) !== null) {
			$img = $this->request->getFile('imagen');
			$newName = $img->getName();
			$img->move('img/productos', $newName);
		} else {
			$newName = '1.jpg';
		}


		$this->productos->update($this->request->getPost('id_producto'), [
			'imagen' => $newName,
			'nombre' => $this->request->getPost('nombre_producto'),
			'marca' => $this->request->getPost('marca'),
			'descripcion' => $this->request->getPost('descripcion'),
			'precio_venta' => $this->request->getPost('precio_venta'),
			'precio_costo' => $this->request->getPost('precio_costo'),
			'stock' => $this->request->getPost('stock'),
			'stock_critico' => $this->request->getPost('stock_critico'),
			'categoria' => $this->request->getPost('categoria'),
			'detalle_fk' => $this->detalle_producto->buscarId(),

		]);

		#$img->move('img/productos/', $img);


		return redirect()->to(base_url() . '/productosadmin');
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


	/*public function buscarIdComuna($id)
	{
		$comuna = $this->direccion->where('id_direccion', $id)->first();
		return $comuna;
	}*/

	public function buscarIdNvl($id)
	{
		$buscarid =  $this->nivel->where('id_nivel', $id)->First();
		return $buscarid;
	}
	public function buscarRut($rut)
	{
		$buscarid =  $this->datosPersonales->where('rut', $rut)->First();
		return $buscarid;
	}

	public function obtnDatos($rut)
	{
		$this->datosPersonales->select('natural_juridico AS juridico,correo,celular,nombres,apellidos,rut,dv,d.calle AS calle, 
		d.numero AS numero,d.ciudad AS ciudad,d.comuna_fk AS comuna,c.region_fk AS region ');
		$this->datosPersonales->join('usuario u', 'datos_personales.rut=u.rut_fk');
		$this->datosPersonales->join('direccion d', 'datos_personales.direccion_fk=d.id_direccion');
		$this->datosPersonales->join('comuna c', 'd.comuna_fk=c.id_comuna');
		$this->datosPersonales->where('rut', $rut);
		$datos = $this->datosPersonales->First();
		return $datos;
	}

	/*public function insertarNvl($id)
	{
		$this->nivel->save(['nivel_acceso' => $id]);
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
/*
		
		
		
		*/
