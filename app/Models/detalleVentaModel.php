<?php

namespace App\Models;

use CodeIgniter\Model;

class detalleVentaModel extends Model
{

    protected $table      = 'detalle_venta';
    protected $primaryKey = 'id_venta_pk';

    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id_producto_pk',
        'cantidad',
    ];

    protected $useTimestamps = false;
    /*protected $createdField  = 'fecha_venta';

    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';*/


    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
