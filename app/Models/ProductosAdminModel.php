<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductosAdminModel extends Model
{

    protected $table      = 'producto';
    protected $primaryKey = 'id_producto';

    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id_producto',
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
        'estado'
    ];

    protected $useTimestamps = false;
    protected $createdField  = 'fecha_creacion';
    /*protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';*/

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;



    public function orderProducto()
    {
        $this->select('*');
        $this->orderBy('fecha_creacion', 'DESC');
        $this->where('estado', 1);
        $data = $this->findAll();
        return $data;
    }
}
