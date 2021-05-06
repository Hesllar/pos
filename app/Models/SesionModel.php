<?php

namespace App\Models;
use CodeIgniter\Model;

class SesionModel extends Model
{

    protected $table      = 'sesion';
    protected $primaryKey = 'id_sesion';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['direccion_ip',
                                'navegador'
                                ];

    protected $useTimestamps = false;
    
    protected $createdField  = 'fecha_registro';
    /*
    protected $updatedField  = 'fecha_entrega';
    protected $deletedField  = 'deleted_at';
    */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
?>