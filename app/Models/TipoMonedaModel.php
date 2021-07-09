<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoMonedaModel extends Model
{

    protected $table      = 'tipo_moneda';
    protected $primaryKey = 'id_moneda';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'nombre_moneda',
        'valor_moneda',
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
