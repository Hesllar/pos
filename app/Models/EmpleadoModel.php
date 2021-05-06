<?php

namespace App\Models;
use CodeIgniter\Model;

class EmpleadoModel extends Model
{

    protected $table      = 'empleado';
    protected $primaryKey = 'id_empleado';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

   /* protected $allowedFields = ['no tiene atributos']; */

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