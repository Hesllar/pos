<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductosAdminModel;
use App\Models\ConfiguracionModel;
use App\Models\CategoriaModel;
use App\Models\DetalleProductoModel;


class ProductosAdmin extends BaseController
{
    protected $productos;
    protected $categorias;
    protected $request;
    protected $detalle_producto;
    public function __construct()
    {
        $this->productos = new ProductosAdminModel;
        $this->configuracion = new ConfiguracionModel;
        $this->categorias = new CategoriaModel;
        $this->detalle_producto = new DetalleProductoModel;
    }

    public function index()
    {

        /*
        $productos = $this->productos->findAll();
        $data = ['titulo' => 'Productos', 'datos' => $productos]; */
        $categorias = $this->categorias->findAll();
        $productos = $this->productos->findAll();
        $configuracion = $this->configuracion->First();
        $data = ['titulo' => 'Productos', 'datos' => $productos, 'configuracion' => $configuracion, 'categorias' => $categorias];


        $estados = [
            'e_venta' => '',
            'e_producto' => 'active',
            'e_ordencompra' => '',
            'e_usuario' => '',
            'e_notacredito' => '',
            'e_config' => ''
        ];

        echo view('header', $data);
        echo view('administrador/panel_header', $estados);
        echo view('administrador/productos_admin', $data);
        echo view('administrador/panel_footer');
        echo view('footer', $data);
    }

    public function NuevoProducto()
    {
        $this->request = \Config\Services::request();

        $this->detalle_producto->save(['fecha_vencimiento' => $this->request->getPost('fecha_vencimiento')]);

        $ultimo_detalle = $this->detalle_producto->orderby('id_detalle_prod', 'DESC')->First();
        $img = $this->request->getFile('imagen');
        $nom = 'img/' . $img->getRandonName();
        $this->productos->save([
            'imagen' => $nom,
            'nombre' => $this->request->getPost('nombre_producto'),
            'marca' => $this->request->getPost('marca'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio_venta' => $this->request->getPost('precio_venta'),
            'precio_costo' => $this->request->getPost('precio_costo'),
            'stock' => $this->request->getPost('stock'),
            'stock_critico' => $this->request->getPost('stock_critico'),
            'categoria' => $this->request->getPost('categoria'),
            'detalle_fk' => $ultimo_detalle['id_detalle_prod']

        ]);
        $img->move('./img');


        return redirect()->to(base_url() . '/productosadmin');
    }
    public function NuevaCategoria()
    {

        $this->request = \Config\Services::request();
        $this->categorias->save([
            'nombre_categoria' => $this->request->getPost('nombre_categoria')
        ]);
        return redirect()->to(base_url() . '/productosadmin');
    }

    public function editar($id)
    {
        $detalle_producto = $this->detalle_producto->First();
        $productos = $this->productos->where('id_producto', $id)->first();
        $configuracion = $this->configuracion->First();
        $categorias = $this->categorias->findAll();
        $data = ['info' => $productos, 'configuracion' => $configuracion, 'categorias' => $categorias, 'detalle_pro' => $detalle_producto];

        #$this->load->view('administrador/productos_admin', $data);
        echo view('header', $data);
        echo view('administrador/editar_producto', $data);
        echo view('footer', $data);
    }
}
