<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;
use App\Models\ConfiguracionModel;
use App\Models\ProductosAdminModel;

class Productos extends BaseController
{
    protected $session;
    protected $request;
    protected $productos;
    protected $categorias;
    protected $producto_dispo;


    public function __construct()
    {
        $this->session = session();
        $this->productos = new ProductosAdminModel();
        $this->categorias = new CategoriaModel();
        $this->configuracion = new ConfiguracionModel;
    }

    public function index()
    {
        $this->request = \Config\Services::request();
        #Condicion para mostrar los productos mayor al stock critico
        if ($this->session->id_sucursal_fk == 3) {
            $productos = $this->productos->orderAllProducto();
        } else if ($this->session->id_sucursal_fk == 2 || $this->session->id_sucursal_fk == 1) {
            $productos = $this->productos->orderProducto($this->session->id_sucursal_fk);
        } else {
            $productos = $this->productos->orderAllProducto();
        }
        $categorias = $this->categorias->findAll();
        $configuracion = $this->configuracion->First();
        $data = [
            'titulo' => 'Productos',
            'datos' => $productos,
            'categorias' => $categorias,
            'configuracion' => $configuracion,
            'scripts' => base_url('js/productos-admin.js')
        ];

        echo view('header', $data);
        echo view('Productos/Productos', $data);
        echo view('footer', $data);
    }

    public function productoEmp()
    {
        $productos = $this->productos->orderProducto($this->session->id_sucursal_fk);
        $categorias = $this->categorias->findAll();
        $configuracion = $this->configuracion->First();
        $data = ['titulo' => 'Productos', 'datos' => $productos, 'categorias' => $categorias, 'configuracion' => $configuracion];
        $estados = [
            'e_producto' => 'active',
            'e_ordencompra' => '',
            'e_proveedor' => '',
        ];
        echo view('header', $data);
        echo view('Empleado/panel_header_emp', $estados);
        echo view('Empleado/productos_emp');
        echo view('administrador/panel_footer');
        echo view('footer');
    }

    public function listarBuscador()
    {
        return json_encode($this->productos->findAll());
    }

    public function buscarNombrePorId($id)
    {
        return $this->productos->where('id_producto' , $id)->First();
    }
}
