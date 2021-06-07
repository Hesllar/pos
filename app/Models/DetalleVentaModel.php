<?php

namespace App\Models;
use CodeIgniter\Model;

class DetalleVentaModel extends Model
{

    protected $table      = 'detalle_venta';
    protected $primaryKey = 'id_detalle_venta';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_producto_pk',
                                'id_venta_pk',
                                'cantidad'                          
                                ];

    protected $useTimestamps = false;
    /*
    protected $createdField  = 'fecha_registro';
    protected $updatedField  = 'fecha_entrega';
    protected $deletedField  = 'deleted_at';
    */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
?>