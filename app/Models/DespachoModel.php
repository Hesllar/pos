<?php

namespace App\Models;
use CodeIgniter\Model;

class DespachoModel extends Model
{

    protected $table      = 'despacho';
    protected $primaryKey = 'id_despacho';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['fecha_entrega',
                                'nombre_recibe',
                                'telefono',
                                'costo_despacho',
                                'estado_despacho', 
                                'venta_fk', 
                                'costo_comuna_fk', 
                                'costo_peso_fk'                         
                                ];

    protected $useTimestamps = false;
    /*
    protected $createdField  = 'fecha_registro';
    */
    protected $updatedField  = 'fecha_entrega';
    /*
    protected $deletedField  = 'deleted_at';
    */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
?>