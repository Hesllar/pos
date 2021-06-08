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

        $this->select('CONCAT("$",FORMAT(sum(total),"")) AS total');
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
    public function datosXPeriodo($fecha_inicio, $fecha_termino)
    {
        $where = "DATE(fecha_venta) >= '$fecha_inicio' AND DATE(fecha_venta) <='$fecha_termino'";

        $this->select('fecha_venta,CONCAT(dt.nombres," ",dt.apellidos) AS nombres,tipo_comprobante,total,f.tipo_pago AS tipo_pago, id_venta, SUM(dv.cantidad) AS cantidad');

        $this->join('usuario AS u', 'venta.cliente_fk=u.id_usuario');
        $this->join('datos_personales AS dt', 'u.rut_fk=dt.rut');
        $this->join('forma_pago AS f', 'venta.forma_pago_fk=f.id_forma_pago');
        $this->join('detalle_venta AS dv', 'venta.id_venta=dv.id_venta_pk');
        $this->groupBy('id_venta');
        return $this->where($where)->findAll();
    }
    public function datosProducXPeriodo($fecha_inicio, $fecha_termino)
    {
        $where = "DATE(fecha_venta) >= '$fecha_inicio' AND DATE(fecha_venta) <='$fecha_termino'";
        $this->select('v.id_venta_pk AS id_venta ,p.nombre AS nombre ,p.precio_venta AS precio');
        $this->join('detalle_venta AS  v', 'venta.id_venta=v.id_venta_pk');
        $this->join('producto AS p', 'v.id_producto_pk=p.id_producto');
        $this->orderBy('id_venta', 'ASC');
        return $this->where($where)->findAll();
    }
}
