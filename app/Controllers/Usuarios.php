<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\DatosPersonales;
use App\Controllers\Proveedor;
use App\Models\UsuarioModel;
use App\Models\ConfiguracionModel;
use App\Models\DatosPersonalesModel;
use App\Models\NivelAccesoModel;
use App\Models\RegionModel;
use App\Models\ComunaModel;
use App\Models\DireccionModel;
use App\Models\EmpresaModel;
use App\Models\EmpleadoModel;
use App\Models\ProveedorModel;

class Usuarios extends BaseController
{
	protected $session;
	protected $proveedor;
	protected $proveedorController;
	protected $empleado;
	protected $empresa;
	protected $nivel;
	protected $direccion;
	protected $region;
	protected $usuarioModal;
	protected $datosPersonales;
	protected $datosPersonalesControl;
	protected $comuna;
	protected $request;
	protected $reglas;


	public function __construct()
	{
		$this->session = session();
		$this->proveedor = new ProveedorModel;
		$this->empleado = new EmpleadoModel;
		$this->empresa = new EmpresaModel;
		$this->direccion = new DireccionModel;
		$this->datosPersonalesControl = new DatosPersonales;
		$this->comuna = new ComunaModel;
		$this->region = new RegionModel;
		$this->nivel = new NivelAccesoModel();
		$this->datosPersonales = new DatosPersonalesModel;
		$this->usuarioModal = new UsuarioModel;
		$this->configuracion = new ConfiguracionModel;
		$this->proveedorController = new Proveedor;
	}

	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url() . "/acceder");
	}



	public function index()
	{
		$this->request = \Config\Services::request();
		if (!isset($this->session->id_usuario)) {
			return redirect()->to(base_url() . '/Acceder');
		}
		$nvl_acceso = $this->nivel->findAll();
		$region = $this->region->findAll();
		$usuario = $this->usuarioModal->DatosPersonalesSucur1($this->session->id_sucursal_fk);
		$configuracion = $this->configuracion->First();

		$data = [
			'titulo' => 'Usuarios',
			'configuracion' => $configuracion,
			'usuarios' => $usuario,
			'nvl_acceso' => $nvl_acceso,
			'region' => $region,
		];

		$estados = [
			'e_venta' => '',
			'e_producto' => '',
			'e_ordencompra' => '',
			'e_usuario' => 'active',
			'e_notacredito' => '',
			'e_config' => '',
			'e_estadistica' => '',
			'e_tipomoneda' => ''
		];

		echo view('header', $data);
		echo view('administrador/panel_header', $estados);
		echo view('administrador/usuarios');
		echo view('administrador/panel_footer');
		echo view('footer');
	}



	/*public function pagNuevoUsuario()
	{

		$comuna = $this->comuna->findAll();
		$nvl_acceso = $this->nivel->findAll();
		$region = $this->region->findAll();
		$usuario = $this->usuarioModal->DatosPersonales();
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
	}*/

	public function insertar()
	{
		if (!isset($this->session->id_usuario)) {
			return redirect()->to(base_url() . '/Acceder');
		}
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
			$img->move('img/Usuarios', $newName);
		}
		$hash = password_hash($this->request->getPost('contraseña'), PASSWORD_DEFAULT);
		//Acá insertamos los datos a la tabla usuario
		if ($this->session->id_sucursal_fk == 1) {
			$this->usuarioModal->save([
				'nom_usuario' => $this->request->getPost('nombre_usuario'),
				'contrasena' => $hash,
				'estado_usuario' => 1,
				'avatar' => $newName,
				'nvl_acceso_fk' => $this->request->getPost('nivel_acceso'),
				'rut_fk' =>  $this->request->getPost('rut'),
				'id_sucursal_fk' => 1
			]);
		} else {
			$this->usuarioModal->save([
				'nom_usuario' => $this->request->getPost('nombre_usuario'),
				'contrasena' => $hash,
				'estado_usuario' => 1,
				'avatar' => $newName,
				'nvl_acceso_fk' => $this->request->getPost('nivel_acceso'),
				'rut_fk' =>  $this->request->getPost('rut'),
				'id_sucursal_fk' => 2
			]);
		}





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

		//Acá insertamos los datos a la tabla empresa
		if ($this->request->getPost('prove') == 1) {
			$this->proveedor->save([
				'rubro' => $this->request->getPost('rubro'),
				'usuario_fk' => $this->proveedorController->BuscarIdUsuario()
			]);
		}


		//Acá insertamos los datos a la tabla empleado

		if ($this->request->getPost('nivel_acceso') == 10) {
			$this->empleado->save([
				'cargo_fk' => 4,
				'usuario_fk' => $this->buscarUltiomoIdUser()
			]);
		} else if ($this->request->getPost('nivel_acceso') == 20) {
			$this->empleado->save([
				'cargo_fk' => 2,
				'usuario_fk' => $this->buscarUltiomoIdUser()
			]);
		} else if ($this->request->getPost('nivel_acceso') == 30) {
			$this->empleado->save([
				'cargo_fk' => 3,
				'usuario_fk' => $this->buscarUltiomoIdUser()
			]);
		}


		return redirect()->to(base_url() . '/Usuarios');
	}

	public function editarUsuario($id, $valid = null)
	{
		if (!isset($this->session->id_usuario)) {
			return redirect()->to(base_url() . '/Acceder');
		}
		$usuario = $this->usuarioModal->where('id_usuario', $id)->first();
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
	public function updateDatosPerso($id, $celular, $correo)
	{
		$this->request = \Config\Services::request();
		$this->datosPersonales->update($this->request->getPost('rut_fk'), [

			'celular' => $celular,
			'correo' => $correo,

		]);
	}

	public function actualizarUsuario()
	{
		if (!isset($this->session->id_usuario)) {
			return redirect()->to(base_url() . '/Acceder');
		}
		$this->request = \Config\Services::request();
		//if ($this->request->getPost('juridco') == 'Si') {
		$this->updateDatosPerso(
			$this->request->getPost('id_usuario'),
			$this->request->getPost('celular'),
			$this->request->getPost('email')
		);

		/*$this->updateDireccion(
			$this->request->getPost('id_direccion'),
			$this->request->getPost('calle'),
			$this->request->getPost('numero'),
			$this->request->getPost('ciudad'),


		);*/


		$this->usuarioModal->update(
			$this->request->getPost('id_usuario'),
			[
				'nom_usuario' => $this->request->getPost('nombre_usuario'),

			]
		);

		#$img->move('img/productos/', $img);


		return redirect()->to(base_url() . '/Usuarios');
	}



	public function listar()
	{
		if (!isset($this->session->id_usuario)) {
			return redirect()->to(base_url() . '/Acceder');
		}
		$usuarios = $this->usuarioModal->FindAll();
		return $usuarios;
	}

	public function buscarPorId($id_usuario)
	{
		if (!isset($this->session->id_usuario)) {
			return redirect()->to(base_url() . '/Acceder');
		}
		$usuarios = $this->usuarioModal->where('id_usuario', $id_usuario)->First();
		return $usuarios;
	}

	public function buscarPorRut($rut_fk)
	{
		if (!isset($this->session->id_usuario)) {
			return redirect()->to(base_url() . '/Acceder');
		}
		$usuarios = $this->usuarioModal->where('rut_fk', $rut_fk)->First();
		return $usuarios;
	}


	/*public function buscarIdComuna($id)
	{
		$comuna = $this->direccion->where('id_direccion', $id)->first();
		return $comuna;
	}*/




	/*public function updateDireccion($id, $calle, $numero, $ciudad)
	{
		$this->request = \Config\Services::request();
		$this->direccion->update(
			$this->request->getPost('id_direccion'),
			[
				'calle' => $calle,
				'numero' => $numero,
				'ciudad' => $ciudad

			]
		);
	}*/




	public function buscarIdNvl($id)
	{
		if (!isset($this->session->id_usuario)) {
			return redirect()->to(base_url() . '/Acceder');
		}
		$buscarid =  $this->nivel->where('id_nivel', $id)->First();
		return $buscarid;
	}
	public function buscarRut($rut)
	{
		if (!isset($this->session->id_usuario)) {
			return redirect()->to(base_url() . '/Acceder');
		}
		$buscarid =  $this->datosPersonales->where('rut', $rut)->First();
		return $buscarid;
	}

	public function obtnDatos($rut)
	{
		if (!isset($this->session->id_usuario)) {
			return redirect()->to(base_url() . '/Acceder');
		}
		$this->datosPersonales->select('natural_juridico AS juridico,correo,celular,nombres,apellidos,rut,dv,d.calle AS calle, 
		d.numero AS numero,d.ciudad AS ciudad,d.comuna_fk AS comuna,c.region_fk AS region, 
		d.id_direccion AS direccion, c.id_comuna AS comuna_id');
		$this->datosPersonales->join('usuario u', 'datos_personales.rut=u.rut_fk');
		$this->datosPersonales->join('direccion d', 'datos_personales.direccion_fk=d.id_direccion');
		$this->datosPersonales->join('comuna c', 'd.comuna_fk=c.id_comuna');
		$this->datosPersonales->where('rut', $rut);
		$datos = $this->datosPersonales->First();
		return $datos;
	}

	public function darBajaUsuario($id, $est = 0)
	{
		if (!isset($this->session->id_usuario)) {
			return redirect()->to(base_url() . '/Acceder');
		}
		$this->request = \Config\Services::request();
		$this->usuarioModal->update($id, ['estado_usuario' => $est]);
		return redirect()->to(base_url() . '/Usuarios');
	}

	public function pagEliminarUsuario()
	{
		if (!isset($this->session->id_usuario)) {
			return redirect()->to(base_url() . '/Acceder');
		}
		$this->request = \Config\Services::request();
		$usuarioOff = $this->datosUsuariosOff();
		$configuracion = $this->configuracion->First();
		$data = ['datos' => $usuarioOff, 'configuracion' => $configuracion];


		echo view('header', $data);
		echo view('administrador/Usuarios_eliminados');
		echo view('footer');
	}

	public function datosUsuariosOff()
	{
		if (!isset($this->session->id_usuario)) {
			return redirect()->to(base_url() . '/Acceder');
		}

		$this->datosPersonales->select('u.id_usuario AS id_usuario,nombres,apellidos,rut,correo, n.nivel_acceso AS nivel_acceso');
		$this->datosPersonales->join('usuario u ', 'datos_personales.rut=u.rut_fk');
		$this->datosPersonales->join('nivel_acceso n ', 'u.nvl_acceso_fk=n.id_nivel');
		$this->datosPersonales->where('estado_usuario', 0);
		$datos = $this->datosPersonales->findAll();
		return $datos;
	}
	public function reingresarUsuario($id, $estado = 1)
	{
		if (!isset($this->session->id_usuario)) {
			return redirect()->to(base_url() . '/Acceder');
		}
		$this->usuarioModal->update($id, ['estado_usuario' => $estado]);
		if ($this->session->nvl_acceso_fk == 10) {
			return redirect()->to(base_url() . '/Usuarios/pagEliminarUsuario ');			
		} else {
			return redirect()->to(base_url() . '/Proveedor/pagProveedorDadoBaja ');
		}
		
	}


	public function buscarUltiomoIdUser()
	{

		$buscarid = $this->usuarioModal->orderBy('id_usuario', 'DESC')->first();
		return $buscarid['id_usuario'];
	}

	public function buscarPorRutJson($rut)
	{
		$user = $this->usuarioModal->where('rut_fk', $rut)->First();
		return json_encode($user['id_usuario']);
	}

	public function crearUsuarioVenta($rutCliente, $nombreCliente, $apellidoCliente)
	{
		/*
		$this->request = \Config\Services::request();
		$rutCliente = $this->request->getVar('cli_rut');
		$nombreCliente = $this->request->getVar('cli_nombres');
		$apellidoCliente = $this->request->getVar('cli_apellidos');
		*/
		$nombreHash = $this->crearNombreYHash($rutCliente, $nombreCliente, $apellidoCliente);
		$fecha = date_create();
		date_timestamp_get($fecha);
		$this->usuarioModal->save([
			'nom_usuario' => $nombreHash['nombre_usuario'],
			'contrasena' => $nombreHash['password'],
			'estado_usuario' => 1,
			'avatar' => 'Juan.png',
			'ultima_conexion' => date('Y-m-d H:i:s'),
			'rut_fk' => $rutCliente,
			'nvl_acceso_fk' => 40,
			'id_sucursal_fk' => 3,
		]);
	}

	public function crearNombreYHash($rut, $nombre, $apellido)
	{
		$subNombre = substr($nombre, 0, 3);
		$subApellido = substr($apellido, 0, 5);
		$nick = $subNombre . $subApellido;
		$subRut = substr($apellido, 0, 5); //19143
		$pss = password_hash($subRut, PASSWORD_DEFAULT);

		return ['nombre_usuario' => $nick, 'password' => $pss];
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
<div class="form-row">
            <div class="form-group col-md-12">
                <label for="comuna">*Comuna</label>
                <select name="comuna" id="comuna">
                    <option value="">Seleccione</option>
                    <?php foreach ($comuna as $comunas) { ?>
                        <option value="<?php echo $comunas['id_comuna'] ?>"><?php echo $comunas['nombre_comuna'] ?> </option>
                    <?php } ?>
                </select>
            </div>
        </div>
			
		*/
