<?php

namespace App\Models;
use CodeIgniter\Model;

class ConfiguracionModel extends Model
{

    protected $table      = 'sistema';
    protected $primaryKey = 'id_config';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['empresa',
                                'rut_empresa',
                                'logo',
                                'correo_principal',
                                'direccion',
                                'telefono',
                                'moneda',
                                'signo_moneda'
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