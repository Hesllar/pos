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


    public function ordenDatos($id_user)
    {
        $this->select('fecha_emision,valor_total,estado_orden,dt.nombres AS nombres');
        $this->join('orden_de_compra as oc', 'proveedor.id_proveedor=oc.proveedor_fk');
        $this->join('empleado as e', 'oc.empleado_fk=e.id_empleado');
        $this->join('usuario as u', 'e.usuario_fk=u.id_usuario');
        $this->join('datos_personales as dt', 'u.rut_fk=dt.rut');
        $this->where('proveedor.usuario_fk', $id_user);
        return $this->findAll();
    }

    public function dtsProv($id_sucur)
    {
        $this->select('id_proveedor, rubro');
        $this->join('usuario as u', 'proveedor.usuario_fk=u.id_usuario');
        $this->where('u.id_sucursal_fk', $id_sucur);
        return $this->findAll();
    }

    /*public function allDatos($id_prov)
    {
        $this->select('e.rut_empresa,e.dvempresa,rubro,e.razon_social,e.telefono,e.giro');
        $this->join('usuario as u', 'proveedor.usuario_fk=u.id_usuario');
        $this->join('datos_personales as dp', 'u.rut_fk=dp.rut');
        $this->join('empresa as e', 'dp.rut=e.DATOS_PERSONALES_rut');
        $this->where('id_proveedor', $id_prov);
        return $this->first();
    }*/

    public function proveedorDadoBaja() {

        $this->select('dp.nombres as Nombre, dp.apellidos as Apellido, us.nom_usuario as Nombre_Usuario, emp.rut_empresa as Rut_Empresa, emp.dvempresa as DV_Empresa, us.id_usuario as id_usuario');
        $this->join('usuario as us', 'proveedor.usuario_fk = us.id_usuario');
        $this->join('datos_personales as dp', 'us.rut_fk = dp.rut');
        $this->join('empresa as emp', 'dp.rut = emp.DATOS_PERSONALES_rut');
        $this->where('us.nvl_acceso_fk', 50);
        $this->where('us.estado_usuario', 0);
        return $this->findAll();
    }
}
