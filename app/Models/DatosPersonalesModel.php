<?php

namespace App\Models;

use CodeIgniter\Model;

class DatosPersonalesModel extends Model
{

    protected $table      = 'datos_personales';
    protected $primaryKey = 'rut';

    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'rut',
        'dv',
        'nombres',
        'apellidos',
        'sexo',
        'celular',
        'natural_juridico',
        'correo',
        'fecha_nacimiento',
        'direccion_fk'
    ];

    protected $useTimestamps = false;

    protected $createdField  = 'fecha_creacion';
    protected $deletedField  = 'deleted_at';


    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
