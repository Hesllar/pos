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


class Proveedor extends BaseController
{
    protected $configuracion;
    protected $proveedor;
    protected $ordenesCompra;
    protected $region;
    protected $request;
    protected $datospersonalesmodel;
    protected $datosPersonalesControl;
    protected $usuarioModal;


    public function __construct()
    {
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
        #Condicion para mostrar los productos mayor al stock critico

        $regionAll = $this->region->findall();
        $proveedor = $this->proveedor->findall();
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
		$this->usuarioModal->save([
			'nom_usuario' => $this->request->getPost('nombre_usuario'),
			'contrasena' => $this->request->getPost('contraseña2'),
			'estado_usuario' => 1,
			'avatar' => $newName,
			'nvl_acceso_fk' => 50,
			'rut_fk' =>  $this->request->getPost('rut')
		]);

        
        $this->proveedor->save([

			'rubro' => $this->request->getPost('rubro'),
			'usuario_fk' => $this->BuscarIdUsuario()
			
		]);

		return redirect()->to(base_url() . '/Proveedor');
	}

    public function BuscarIdUsuario()

    {
        $BuscarIdUsuario = $this->usuarioModal->orderBy('id_usuario', 'DESC')->First();

        return $BuscarIdUsuario['id_usuario'];

    }
    
}
