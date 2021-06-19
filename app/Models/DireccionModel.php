<?php

namespace App\Models;

use CodeIgniter\Model;

class DireccionModel extends Model
{

    protected $table      = 'direccion';
    protected $primaryKey = 'id_direccion';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'calle',
        'numero',
        'piso',
        'referencia',
        'ciudad',
        'comuna_fk'
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
