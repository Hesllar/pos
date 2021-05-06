<?php

namespace App\Models;
use CodeIgniter\Model;

class OrdenCompraModel extends Model
{

    protected $table      = 'orden_de_compra';
    protected $primaryKey = 'id_orden';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['valo_neto',
                                'valor_iva',
                                'valor_total',
                                'estado_orden',
                                'conversion_moneda'];

    protected $useTimestamps = false;
    
    protected $createdField  = 'fecha_emision';
    /*
    protected $updatedField  = 'fecha_entrega';
    protected $deletedField  = 'deleted_at';
    */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
?>