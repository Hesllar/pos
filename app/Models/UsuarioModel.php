<?php

namespace App\Models;
use CodeIgniter\Model;

class UsuarioModel extends Model
{

    protected $table      = 'usuario';
    protected $primaryKey = 'id_usuario';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nom_usuario',
                                'contrasena',
                                'estado_usuario',
                                'avatar',
                                'ultima_conexion'
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
?>