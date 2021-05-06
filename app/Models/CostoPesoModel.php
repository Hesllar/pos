<?php

namespace App\Models;
use CodeIgniter\Model;

class CostoPesoModel extends Model
{

    protected $table      = 'costo_peso';
    protected $primaryKey = 'id_peso';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['peso_kg',
                                'costo_peso'                          
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