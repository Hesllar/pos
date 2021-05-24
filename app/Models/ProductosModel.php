<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductosModel extends Model
{

    protected $table      = 'producto';
    protected $primaryKey = 'id_producto';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
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

    public function masvendido(){
        $this->select('*');     
        $this->where('estado',1 );
        $this->orderBy ('fecha_creacion','ASC');
        $data = $this->findAll();
        return $data;
    }
    
}
