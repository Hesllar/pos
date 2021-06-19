<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\DetalleProducto;
use App\Models\ProductosAdminModel;
use App\Models\ConfiguracionModel;
use App\Models\CategoriaModel;
use App\Controllers\Categorias;
use App\Models\DetalleProductoModel;



class ProductosAdmin extends BaseController
{
    protected $productos;
    protected $categorias;
    protected $request;
    protected $detalle_producto;
    protected $detalle_productoModel;
    protected $categoria;
    protected $reglas;
    protected $session;

    public function __construct()
    {

        $this->detalle_productoModel = new DetalleProductoModel;
        $this->productos = new ProductosAdminModel;
        $this->configuracion = new ConfiguracionModel;
        $this->categorias = new CategoriaModel;
        $this->detalle_producto = new DetalleProducto;
        $this->categoria = new Categorias;
        $this->session = session();
        helper(['form', 'upload']);
        /*$this->reglas = [
            'imagen' => 'required',
            'Codigo_barra' => 'required',
            'nombre_producto' => 'required',
            'marca' => 'required',
            'descripcion' => 'required',
            'precio_venta' => 'required',
            'precio_costo' => 'required',
            'stock' => 'required',
            'stock_critico' => 'required',
            'categoria' => 'required',
            'fecha_vencimiento' => 'required',
        ];*/
        $this->reglas1 = [
            //'imagen' => 'required',
            'nombre_producto' => 'required',
            'marca' => 'required',
            'descripcion' => 'required',
            'precio_venta' => 'required',
            'precio_costo' => 'required',
            'stock_critico' => 'required',
            'categoria' => 'required',
        ];
    }

    public function index()
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . '/Acceder');
        }
        /*
        $productos = $this->productos->findAll();
        $data = ['titulo' => 'Productos', 'datos' => $productos]; */
        $categorias = $this->categorias->findAll();
        $productos = $this->productos->orderProducto($this->session->id_sucursal_fk);

        $configuracion = $this->configuracion->First();
        $data = ['titulo' => 'Productos', 'datos' => $productos, 'configuracion' => $configuracion, 'categorias' => $categorias];


        $estados = [
            'e_venta' => '',
            'e_producto' => 'active',
            'e_ordencompra' => '',
            'e_usuario' => '',
            'e_notacredito' => '',
            'e_config' => '',
            'e_estadistica' => ''
        ];

        echo view('header', $data);
        echo view('administrador/panel_header', $estados);
        echo view('administrador/productos_admin', $data);
        echo view('administrador/panel_footer');
        echo view('footer', $data);
    }
    // Funcion del administrador
    public function NuevoProducto()
    {

        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . '/Acceder');
        }

        $this->request = \Config\Services::request();

        $this->detalle_producto->agregarFecha(
            $this->request->getPost('fecha_vencimiento')
        );

        $validacion = $this->validate([
            'imagen' => [
                'uploaded[imagen]',
                'max_size[imagen, 4096]'
            ]
        ]);

        if ($validacion) {

            $img = $this->request->getFile('imagen');
            $newName = $img->getName();
            $img->move('img/productos', $newName);
        }


        if ($this->session->id_sucursal_fk == 1) {
            $this->productos->save([
                'imagen' => $newName,
                //'id_producto' => $this->request->getPost('Codigo_barra'),
                'nombre' => $this->request->getPost('nombre_producto'),
                'marca' => $this->request->getPost('marca'),
                'descripcion' => $this->request->getPost('descripcion'),
                'precio_venta' => $this->request->getPost('precio_venta'),
                'precio_costo' => $this->request->getPost('precio_costo'),
                'stock' => $this->request->getPost('stock'),
                'stock_critico' => $this->request->getPost('stock_critico'),
                'categoria' => $this->request->getPost('categoria'),
                'detalle_fk' => $this->detalle_producto->buscarId(),
                'estado' => 1,
                'id_sucursal_fk' => 1
            ]);
        } else {
            $this->productos->save([
                'imagen' => $newName,
                //'id_producto' => $this->request->getPost('Codigo_barra'),
                'nombre' => $this->request->getPost('nombre_producto'),
                'marca' => $this->request->getPost('marca'),
                'descripcion' => $this->request->getPost('descripcion'),
                'precio_venta' => $this->request->getPost('precio_venta'),
                'precio_costo' => $this->request->getPost('precio_costo'),
                'stock' => $this->request->getPost('stock'),
                'stock_critico' => $this->request->getPost('stock_critico'),
                'categoria' => $this->request->getPost('categoria'),
                'detalle_fk' => $this->detalle_producto->buscarId(),
                'estado' => 1,
                'id_sucursal_fk' => 2
            ]);
        }

        return redirect()->to(base_url() . '/productosadmin');
    }

    // Funcion del empleado
    public function NuevoProductoEmp()
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . '/Acceder');
        }
        $this->request = \Config\Services::request();

        $this->detalle_producto->agregarFecha(
            $this->request->getPost('fecha_vencimiento')
        );


        $validacion = $this->validate([
            'imagen' => [
                'uploaded[imagen]',
                'max_size[imagen, 4096]'
            ]
        ]);

        if ($validacion) {

            $img = $this->request->getFile('imagen');
            $newName = $img->getName();
            $img->move('img/productos', $newName);
        }




        $this->productos->save([
            'imagen' => $newName,
            //'id_producto' => $this->request->getPost('Codigo_barra'),
            'nombre' => $this->request->getPost('nombre_producto'),
            'marca' => $this->request->getPost('marca'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio_venta' => $this->request->getPost('precio_venta'),
            'precio_costo' => $this->request->getPost('precio_costo'),
            'stock' => $this->request->getPost('stock'),
            'stock_critico' => $this->request->getPost('stock_critico'),
            'categoria' => $this->request->getPost('categoria'),
            'detalle_fk' => $this->detalle_producto->buscarId(),
            'estado' => 1,
        ]);

        return redirect()->to(base_url() . '/Productos/productoEmp');
    }
    //Funcion administrador
    public function NuevaCategoria()
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . '/Acceder');
        }
        $this->request = \Config\Services::request();
        $this->categorias->save([
            'nombre_categoria' => $this->request->getPost('nombre_categoria')
        ]);
        return redirect()->to(base_url() . '/productosadmin');
    }
    //Funcion empleado
    public function NuevaCategoriaEmp()
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . '/Acceder');
        }

        $this->request = \Config\Services::request();
        $this->categorias->save([
            'nombre_categoria' => $this->request->getPost('nombre_categoria')
        ]);
        return redirect()->to(base_url() . '/Productos/productoEmp');
    }
    //Funcion administrador
    public function editar($id, $valid = null)
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . '/Acceder');
        }

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
    }
    //Funcion empleado
    public function editarEmp($id, $valid = null)
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . '/Acceder');
        }

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
        echo view('Empleado/editar_producto_emp');
        echo view('footer');
    }
    //Funcion administrador
    public function actualizar()
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . '/Acceder');
        }

        $this->request = \Config\Services::request();
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas1)) {

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
                'stock_critico' => $this->request->getPost('stock_critico'),
                'categoria' => $this->request->getPost('categoria'),
                'detalle_fk' => $this->detalle_producto->buscarId(),

            ]);

            #$img->move('img/productos/', $img);


            return redirect()->to(base_url() . '/productosadmin');
        } else {
            return $this->editar($this->request->getPost('id_producto'), $this->validator);
        }
    }
    //Funcion empleado
    public function actualizarEmp()
    {

        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . '/Acceder');
        }
        $this->request = \Config\Services::request();
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas1)) {

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
                'stock_critico' => $this->request->getPost('stock_critico'),
                'categoria' => $this->request->getPost('categoria'),
                'detalle_fk' => $this->detalle_producto->buscarId(),

            ]);

            #$img->move('img/productos/', $img);


            return redirect()->to(base_url() . '/productos/productoEmp'); //revisar!
        } else {
            return $this->editar($this->request->getPost('id_producto'), $this->validator);
        }
    }


    public function eliminarProducto($id, $est = 0)
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . '/Acceder');
        }
        /*
        $productos = $this->productos->findAll();
        $data = ['titulo' => 'Productos', 'datos' => $productos]; */
        $this->productos->update($id, ['estado' => $est]);
        return redirect()->to(base_url() . '/productosadmin');
    }

    public function pagEliminarPro()
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . '/Acceder');
        }
        $this->request = \Config\Services::request();
        $productos = $this->productos->where('estado', 0)->findAll();
        $configuracion = $this->configuracion->First();
        $data = ['datos' => $productos, 'configuracion' => $configuracion,];


        echo view('header', $data);
        echo view('administrador/eliminar_producto');
        echo view('footer');
    }

    public function reingresarProd($id, $estado = 1)
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . '/Acceder');
        }
        $this->productos->update($id, ['estado' => $estado]);
        return redirect()->to(base_url() . '/productosadmin/pagEliminarPro ');
    }
    public function eliminar($id)
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . '/Acceder');
        }
        $this->request = \Config\Services::request();
        //$producto_eliminado = $this->productos->where('id_producto', $id)->first();
        //$this->detalle_productoModel->where('id_detalle_prod', $producto_eliminado['detalle_fk'])->delete();
        $this->productos->where('id_producto', $id)->delete();
        return redirect()->to(base_url() . '/productosadmin/pagEliminarPro ');
    }
}
