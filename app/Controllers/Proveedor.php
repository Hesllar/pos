<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Configuracion;
use App\Models\ConfiguracionModel;
use App\Models\ProveedorModel;
use App\Controllers\OrdenesCompra;
use App\Models\RegionModel;
use App\Models\DatosPersonalesModel;
use App\Controllers\DatosPersonales;
use App\Models\UsuarioModel;
use App\Models\EmpresaModel;
use App\Models\EmpleadoModel;
use App\Models\ProductosAdminModel;



class Proveedor extends BaseController
{
	protected $empleado;
	protected $empresa;
	protected $configuracion;
	protected $proveedor;
	protected $ordenesCompra;
	protected $region;
	protected $request;
	protected $datospersonalesmodel;
	protected $datosPersonalesControl;
	protected $usuarioModal;
	protected $productos;
	protected $session;

	public function __construct()
	{
		$this->session = session();
		$this->empleado = new EmpleadoModel;
		$this->productos = new ProductosAdminModel;
		$this->empresa = new EmpresaModel;
		$this->configuracion = new ConfiguracionModel;
		$this->proveedor = new ProveedorModel;
		$this->ordenesCompra = new OrdenesCompra;
		$this->region = new RegionModel;
		$this->datospersonalesmodel = new DatosPersonalesModel;
		$this->datosPersonalesControl = new DatosPersonales;
		$this->usuarioModal = new UsuarioModel;
	}

	public function index()
	{
		if (!isset($this->session->id_usuario)) {
			return redirect()->to(base_url() . '/Acceder');
		}
		#Condicion para mostrar los productos mayor al stock critico

		$regionAll = $this->region->findall();
		$proveedor = $this->dtsProveedor($this->session->id_sucursal_fk);
		$configuracion = $this->configuracion->First();
		$data = ['datos' => $proveedor, 'configuracion' => $configuracion, 'region' => $regionAll];
		$estados = [
			'e_producto' => '',
			'e_ordencompra' => '',
			'e_proveedor' => '',
			'e_config' => 'active'
		];
		echo view('header', $data);
		echo view('Empleado/panel_header_emp', $estados);
		echo view('Empleado/proveedor_emp');
		echo view('administrador/panel_footer');
		echo view('footer');
	}

	public function insertarProveedor()
	{
		if (!isset($this->session->id_usuario)) {
			return redirect()->to(base_url() . '/Acceder');
		}
		$this->request = \Config\Services::request();
		//Acá la funciones insertarNvl obtiene el nivel de acceso y lo guarda en su respectiva tabla
		/*$this->nivel->insertarNvl([
			$this->request->getPost('nivel_acceso')
		]);*/



		//Acá se obtienen los datos de la tabla direccion
		$this->datosPersonalesControl->insertarDireccionProveedor(
			$this->request->getPost('ciudad'),
			$this->request->getPost('calle'),
			$this->request->getPost('numero'),
			$this->request->getPost('comuna')
		);

		//Acá la funciones insertarDatosProveedor obtiene todos los campos y lo guarda en su respectiva tabla
		$this->datosPersonalesControl->insertarDatosProveedor(
			$this->request->getPost('rut'),
			$this->request->getPost('dv'),
			$this->request->getPost('nombre'),
			$this->request->getPost('apellidos'),
			$this->request->getPost('email'),
			$this->request->getPost('celular'),

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
		if ($this->session->id_sucursal_fk == 1) {
			$this->usuarioModal->save([
				'nom_usuario' => $this->request->getPost('nombre_usuario'),
				'contrasena' => $hash,
				'estado_usuario' => 1,
				'avatar' => $newName,
				'nvl_acceso_fk' => 50,
				'rut_fk' =>  $this->request->getPost('rut'),
				'id_sucursal_fk' => 1
			]);
		} else {
			$this->usuarioModal->save([
				'nom_usuario' => $this->request->getPost('nombre_usuario'),
				'contrasena' => $hash,
				'estado_usuario' => 1,
				'avatar' => $newName,
				'nvl_acceso_fk' => 50,
				'rut_fk' =>  $this->request->getPost('rut'),
				'id_sucursal_fk' => 2
			]);
		}


		//Acá se obtienen los datos de la tabla proveedor
		$this->proveedor->save([

			'rubro' => $this->request->getPost('rubro'),
			'usuario_fk' => $this->BuscarIdUsuario()

		]);

		//Acá se obtienen los datos de la tabla empresa
		$this->empresa->save([
			'rut_empresa' => $this->request->getPost('rut_emp'),
			'dvempresa' => $this->request->getPost('dv_emp'),
			'razon_social' => $this->request->getPost('razon'),
			'giro' => $this->request->getPost('giro'),
			'telefono' => $this->request->getPost('telefono'),
			'DATOS_PERSONALES_rut' =>  $this->request->getPost('rut'),
			'direccion_empresa' => $this->datosPersonalesControl->buscarIdDireccion()
		]);

		return redirect()->to(base_url() . '/Proveedor');
	}

	public function BuscarIdUsuario()

	{
		if (!isset($this->session->id_usuario)) {
			return redirect()->to(base_url() . '/Acceder');
		}
		$BuscarIdUsuario = $this->usuarioModal->orderBy('id_usuario', 'DESC')->First();

		return $BuscarIdUsuario['id_usuario'];
	}

	/*public function editarProveedor($id, $valid = null)
	{

		$productos = $this->productos->where('id_producto', $id)->first();
		$categoria = $this->categoria->buscarId($productos['categoria']);
		$fecha_venci = $this->detalle_producto->obtFechaVenci($productos['detalle_fk']);
		$configuracion = $this->configuracion->First();
		$categorias = $this->categorias->findAll();
		if ($valid != null) {

			$data = [
				'datos' => $productos, 'configuracion' => $configuracion, 'categorias' => $categorias,
				'cat' => $categoria, 'fecha_venci' => $fecha_venci, 'validation' => $valid
			];
		} else {
			$data = [
				'datos' => $productos, 'configuracion' => $configuracion, 'categorias' => $categorias,
				'cat' => $categoria, 'fecha_venci' => $fecha_venci
			];
		}

		#$this->load->view('administrador/productos_admin', $data);
		echo view('header', $data);
		echo view('administrador/editar_producto');
		echo view('footer');
	}*/


	public function dtsProveedor($id_sucur)
	{
		if (!isset($this->session->id_usuario)) {
			return redirect()->to(base_url() . '/Acceder');
		}

		$this->request = \Config\Services::request();
		$this->datospersonalesmodel->select('CONCAT(e.rut_empresa, "-", e.dvempresa) AS rut_emp, u.id_usuario as id_usuario, e.razon_social AS razon, e.giro AS giro, p.rubro AS rubro, p.id_proveedor AS id_proveedor');
		$this->datospersonalesmodel->join('empresa as e', 'datos_personales.rut=e.DATOS_PERSONALES_rut');
		$this->datospersonalesmodel->join('usuario as u', 'datos_personales.rut=u.rut_fk');
		$this->datospersonalesmodel->join('proveedor as p', 'u.id_usuario=p.usuario_fk');
		$this->datospersonalesmodel->where('u.estado_usuario', 1);
		$this->datospersonalesmodel->where('u.id_sucursal_fk', $id_sucur);
		$this->datospersonalesmodel->orderBy('id_proveedor', 'DESC');
		$datos = $this->datospersonalesmodel->findAll();
		return $datos;
	}

	public function pagOrden()
	{
		if (!isset($this->session->id_usuario)) {
			return redirect()->to(base_url() . '/Acceder');
		}
		$proveedor = $this->dtsProveedor($this->session->id_sucursal_fk);
		$productos = $this->productos->findAll();
		$configuracion = $this->configuracion->First();
		$data = ['datos' => $proveedor, 'configuracion' => $configuracion, 'productos' => $productos];

		echo view('header', $data);
		echo view('administrador/crear_orden');
		echo view('footer');
		echo view('ordenjs');
	}


	public function buscarIdProveedor($codigo)
	{
		if (!isset($this->session->id_usuario)) {
			return redirect()->to(base_url() . '/Acceder');
		}
		$this->datospersonalesmodel->select('e.rut_empresa AS rut_emp,e.dvempresa AS dv_empresa,e.razon_social AS razon,e.giro AS giro,p.rubro AS rubro,
		p.id_proveedor AS id_proveedor,e.telefono AS telefono');
		$this->datospersonalesmodel->join('empresa as e', 'datos_personales.rut=e.DATOS_PERSONALES_rut');
		$this->datospersonalesmodel->join('usuario as u', 'datos_personales.rut=u.rut_fk');
		$this->datospersonalesmodel->join('proveedor as p', 'u.id_usuario=p.usuario_fk');
		$this->datospersonalesmodel->where('p.id_proveedor', $codigo);
		$this->datospersonalesmodel->where('u.estado_usuario', 1);
		$datos = $this->datospersonalesmodel->get()->getRow();



		$res['existe'] = false;
		$res['datos'] = '';
		$res['error'] = '';

		if ($datos) {
			$res['datos'] = $datos;
			$res['existe'] = true;
		} else {
			$res['error']  = 'No existe el id';
			$res['existe'] = false;
		}

		echo json_encode($res);
	}


	public function buscarProducto($codigo)
	{
		if (!isset($this->session->id_usuario)) {
			return redirect()->to(base_url() . '/Acceder');
		}
		$this->productos->select('CONCAT("$", precio_costo) AS precio_costo, id_producto, marca, nombre, stock');
		$this->productos->where('id_producto', $codigo);
		$datos = $this->productos->get()->getRow();

		$res['existe'] = false;
		$res['datos'] = '';
		$res['error'] = '';

		if ($datos) {
			$res['datos'] = $datos;
			$res['existe'] = true;
		} else {
			$res['error']  = 'No existe el id';
			$res['existe'] = false;
		}

		echo json_encode($res);
	}


	public function buscarEmp($id_usuario)
	{
		if (!isset($this->session->id_usuario)) {
			return redirect()->to(base_url() . '/Acceder');
		}
		$this->empleado->select('*');
		$this->empleado->where('usuario_fk', $id_usuario);
		$datos = $this->empleado->get()->getRow();
		$res['existe'] = false;
		$res['datos'] = '';
		$res['error'] = '';

		if ($datos) {
			$res['datos'] = $datos;
			$res['existe'] = true;
		} else {
			$res['error']  = 'No existe el id';
			$res['existe'] = false;
		}

		echo json_encode($res);
	}

	public function pagProovedorView()
	{
		$orden_compra = $this->proveedor->ordenDatos($this->session->id_usuario);
		$configuracion = $this->configuracion->First();
		$data = ['configuracion' => $configuracion, 'datos' => $orden_compra];
		$estados = [
			'e_ordencompra' => '',
			'e_config' => 'active'
		];
		echo view('header', $data);
		echo view('panel_header_prov', $estados);
		echo view('proovedor_view');
		echo view('administrador/panel_footer');
		echo view('footer');
	}

	public function pagProveedorDadoBaja()
	{
		$configuracion = $this->configuracion->First();
		$proveedorBaja = $this->proveedor->proveedorDadoBaja();
		$data = ['configuracion' => $configuracion, 'datos' => $proveedorBaja];
		echo view('header', $data);
		echo view('empleado/proveedores_eliminados_emp');
		echo view('footer');

	}

	public function ProveedorDadoBaja($id_proveedor, $est = 0) {
		$this->request = \Config\Services::request();
		$this->usuarioModal->update($id_proveedor, ['estado_usuario' => $est]);
		return redirect()->to(base_url() . '/Proveedor');
	}
}
