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

    protected $allowedFields = ['nombre_recibe',
                                'telefono',
                                'costo_despacho'                              
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