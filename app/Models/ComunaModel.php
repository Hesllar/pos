<?php

namespace App\Models;
use CodeIgniter\Model;

class ComunaModel extends Model
{

    protected $table      = 'comuna';
    protected $primaryKey = 'id_comuna';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre_comuna','region_fk'];

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
