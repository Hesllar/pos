<?php

namespace App\Models;

use CodeIgniter\Model;

class ProveedorModel extends Model
{

    protected $table      = 'proveedor';
    protected $primaryKey = 'id_proveedor';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id_proveedor',
        'rubro',
        'usuario_fk'
    ];

    protected $useTimestamps = false;

    protected $createdField  = 'fecha_registro';
    /*
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
