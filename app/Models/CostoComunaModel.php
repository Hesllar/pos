<?php

namespace App\Models;
use CodeIgniter\Model;

class CostoComunaModel extends Model
{

    protected $table      = 'costo_comuna';
    protected $primaryKey = 'id_costo';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['costo_comuna'];

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