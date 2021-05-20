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
    ];


    protected $useTimestamps = false;
    protected $createdField  = 'fecha_registro';
    protected $deletedField  = 'deleted_at';
    

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    public function DatosPersonales()
    {

        $this->select('id_usuario,nvl_acceso_fk, nom_usuario, d.nombres AS nombres, d.apellidos AS apellidos, 
        d.rut AS rut, d.correo AS correo, n.nivel_acceso AS nivel_acceso');
        $this->join('datos_personales AS d', 'usuario.rut_fk = d.rut');
        $this->join('nivel_acceso AS n', 'usuario.nvl_acceso_fk = n.id_nivel');
        $this->orderBy('id_usuario', 'DESC');
        $datos = $this->findAll();
        return $datos;
    }

    /*public function obtnRegion($id)
    {
        $this->select('r.id_region AS id,r.nombre_region AS region');
        $this->join('datos_personales AS d', 'usuario.rut_fk=d.rut');
        $this->join('direccion AS dr', 'd.direccion_fk=dr.id_direccion');
        $this->join('comuna AS c', 'dr.comuna_fk=c.id_comuna');
        $this->join('region AS r', 'c.region_fk=r.id_region');
        $this->where('id_usuario', $id);
        $datos = $this->first();
        return $datos;
    }*/
}
