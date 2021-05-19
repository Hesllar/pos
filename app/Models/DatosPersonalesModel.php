<?php

namespace App\Models;
use CodeIgniter\Model;

class DatosPersonalesModel extends Model
{

    protected $table      = 'datos_personales';
    protected $primaryKey = 'rut';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['dv',
                                'nombres',
                                'apellidos',
                                'sexo',
                                'celular',
                                'natural_juridico',
                                'fecha_nacimiento',
                                'correo'                                
                                ];

    protected $useTimestamps = false;
   
    protected $createdField  = 'fecha_creacion';
    /*
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
?>