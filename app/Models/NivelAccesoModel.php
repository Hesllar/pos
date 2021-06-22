<?php

namespace App\Models;

use CodeIgniter\Model;

class NivelAccesoModel extends Model
{

    protected $table      = 'nivel_acceso';
    protected $primaryKey = 'id_nivel';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nivel_acceso'];

    protected $useTimestamps = false;
    /*
    protected $createdField  = 'fecha_registro';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
