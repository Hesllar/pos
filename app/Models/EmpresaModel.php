<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpresaModel extends Model
{

    protected $table      = 'empresa';
    protected $primaryKey = 'rut_empresa';

    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'rut_empresa',
        'dvempresa',
        'razon_social',
        'giro',
        'telefono',
        'direccion_empresa',
        'DATOS_PERSONALES_rut',
    ];

    protected $useTimestamps = false;

    /*protected $createdField  = 'fecha_registro';
    
    protected $updatedField  = 'fecha_entrega';
    protected $deletedField  = 'deleted_at';
    */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
