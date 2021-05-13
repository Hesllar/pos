<?php

namespace App\Controllers;


use App\Controllers\BaseController;
#use App\Models\ProductosAdminModel;
#use App\Models\CategoriaModel;
use App\Models\DetalleProductoModel;
use CodeIgniter\HTTP\Request;

#use App\Controllers\Categorias;

class DetalleProducto extends BaseController
{
    #protected $productos;
    #protected $categorias;
    protected $request;
    protected $detalle_producto;
    # protected $categoria;
    public function __construct()
    {

        #$this->productos = new ProductosAdminModel;
        #$this->configuracion = new ConfiguracionModel;
        #$this->categorias = new CategoriaModel;
        $this->detalle_producto = new DetalleProductoModel;
        #$this->categoria = new Categorias;
    }



    public function agregarFecha($id)
    {
        $this->request = \Config\Services::request();
        $this->detalle_producto->save(['fecha_vencimiento' => $id]);
    }


    public function buscarId()
    {
        $buscarid =  $this->detalle_producto->orderBy('id_detalle_prod')->First();
        return $buscarid['id_detalle_prod'];
    }

    public function actualizarFecha($id, $fecha)
    {

        $this->request = \Config\Services::request();

        $this->detalle_producto->update(
            $id,
            [
                'fecha_vencimiento' =>
                $fecha
            ]
        );
    }



    public function obtFechaVenci($id)
    {
        $this->detalle_producto->select('fecha_vencimiento');
        $this->detalle_producto->join('producto AS p', 'detalle_producto.id_detalle_prod = p.detalle_fk');
        $this->detalle_producto->where('id_detalle_prod', $id);
        $datos = $this->detalle_producto->First();
        return $datos;
    }
}
