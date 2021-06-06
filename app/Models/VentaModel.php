<?php

namespace App\Models;

use CodeIgniter\Model;

class VentaModel extends Model
{

    protected $table      = 'venta';
    protected $primaryKey = 'id_venta';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'tipo_comprobante',
        'fecha_venta',
        'valor_neto',
        'valor_iva',
        'total',
        'despacho',
        'estado_venta',
        'conversion_moneda',
        'empleado_fk',
        'cliente_fk',
        'forma_pago_fk',
    ];

    protected $useTimestamps = false;
    protected $createdField  = 'fecha_venta';
    
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;




    public function todasLasVentas()
    {
        return $this->where('estado_venta', 1)->countAllResults();
    }
    public function totalVentas()
    {

        $this->select('sum(total) AS total');
        return $this->where('estado_venta', 1)->first();
    }

    public function ventasXEmpleado()
    {
        $this->select('CONCAT(d.nombres," ",d.apellidos) AS nombre,CONCAT(d.rut, "-",d.dv) AS rut,empleado_fk AS empleado, CONCAT("$",FORMAT(sum(total),"")) AS total, count(id_venta) AS venta');
        $this->join('empleado as e', 'venta.empleado_fk=e.id_empleado');
        $this->join('usuario as u', 'e.usuario_fk=u.id_usuario');
        $this->join('datos_personales as d', 'u.rut_fk=d.rut');
        $this->groupBy('empleado');
        return $this->findAll();
    }
}
