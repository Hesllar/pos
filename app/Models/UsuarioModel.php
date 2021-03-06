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


    protected $allowedFields = [
        'nom_usuario',
        'contrasena',
        'estado_usuario',
        'avatar',
        'ultima_conexion',
        'nvl_acceso_fk',
        'rut_fk',
        'id_sucursal_fk'
    ];


    protected $useTimestamps = false;
    protected $createdField  = 'fecha_registro';
    protected $deletedField  = 'deleted_at';


    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    public function DatosPersonalesSucur1($id_sucur)
    {
        $valores = [3, $id_sucur];
        $this->select('id_usuario,nvl_acceso_fk, nom_usuario, d.nombres AS nombres, d.apellidos AS apellidos, 
        CONCAT(d.rut, "-",d.dv) AS rut, d.correo AS correo, n.nivel_acceso AS nivel_acceso');
        $this->join('datos_personales AS d', 'usuario.rut_fk = d.rut');
        $this->join('nivel_acceso AS n', 'usuario.nvl_acceso_fk = n.id_nivel');
        $this->where('estado_usuario', 1);
        $this->whereIn('id_sucursal_fk', $valores);
        $this->orderBy('id_usuario', 'DESC');
        $datos = $this->findAll();
        return $datos;
    }
}
