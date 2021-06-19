<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductosAdminModel extends Model
{

    protected $table      = 'producto';
    protected $primaryKey = 'id_producto';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        //'id_producto',
        'n_registro',
        'imagen',
        'nombre',
        'marca',
        'descripcion',
        'precio_venta',
        'precio_costo',
        'stock',
        'stock_critico',
        'categoria',
        'detalle_fk',
        'estado',
        'id_sucursal_fk'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = '';
    //protected $deletedField  = 'deleted_at';*/

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;



    public function orderProducto($id_sucur)
    {
        $this->select('id_producto, nombre,CONCAT("$",FORMAT(precio_venta,"")) AS precio_venta, stock, categoria, imagen, precio_venta, descripcion');
        $this->where('estado', 1);
        $this->where('id_sucursal_fk', $id_sucur);
        $this->where('stock >', 0);
        $this->orderBy('id_producto', 'DESC');
        $data = $this->findAll();
        return $data;
    }
    public function orderProductoDelete($id_sucur)
    {
        $this->select('id_producto, nombre,CONCAT("$",FORMAT(precio_venta,"")) AS precio_venta, stock, categoria');
        $this->where('estado', 0);
        $this->where('id_sucursal_fk', $id_sucur);
        $this->orderBy('id_producto', 'DESC');
        $data = $this->findAll();
        return $data;
    }
    public function orderAllProducto()
    {
        $this->select('id_producto, nombre,CONCAT("$",FORMAT(precio_venta,"")) AS precio_venta, stock, categoria, imagen, precio_venta, descripcion');
        $this->where('estado', 1);
        $this->where('stock >', 0);
        $this->orderBy('id_producto', 'DESC');
        $data = $this->findAll();
        return $data;
    }

    public function totalProductos()
    {
        return $this->where('estado', 1)->countAllResults(); // Cuenta todos los resultados de la sentencia
    }


    public function StockMinimos()
    {
        $where = "stock_critico >= stock AND estado=1";
        return $this->where($where)->countAllResults();
    }
    public function productosStockCriti()
    {
        $where = "stock_critico >= stock AND estado=1";
        return $this->where($where)->findAll();
    }

    public function productosTotales()
    {
        return $this->where('estado', 1)->findAll(); // Muestra todos los resultados de la sentencia
    }
    public function actualizarStock($id_producto, $cantidad)
    {
        $this->set('stock', "stock - $cantidad", FALSE);
        $this->join('detalle_venta AS d', 'producto.id_producto=d.id_producto_fk');
        $this->where('id_producto', $id_producto);
        $this->update();
    }
    public function masvendido()
    {
        $this->select('*');
        $this->where('estado', 1);
        $this->orderBy('fecha_creacion', 'ASC');
        $data = $this->findAll();
        return $data;
    }
}
