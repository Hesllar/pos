<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleProductoModel extends Model
{

    protected $table      = 'detalle_producto';
    protected $primaryKey = 'id_detalle_prod';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['fecha_vencimiento'];

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
