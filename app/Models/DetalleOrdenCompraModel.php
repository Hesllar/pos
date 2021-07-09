<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleOrdenCompraModel extends Model
{

    protected $table      = 'detalle_orden_de_compra';
    protected $primaryKey = 'id_detalle_orden';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'n_orden_pk',
        'id_producto_pk',
        'cantidad',
        'cantidad_recibida',
        'precio_costo',
        'valor_total',
    ];

    protected $useTimestamps = false;

    /*protected $createdField  = 'fecha_emision';
   
    protected $updatedField  = 'fecha_entrega';
    protected $deletedField  = 'deleted_at';
    */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
