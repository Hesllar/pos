<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdenCompraModel extends Model
{

    protected $table      = 'orden_de_compra';
    protected $primaryKey = 'id_orden';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'valor_neto',
        'valor_iva',
        'valor_total',
        'estado_orden',
        'conversion_moneda',
        'empleado_fk',
        'proveedor_fk',
        'fecha_emision',
        'fecha_update'
    ];

    protected $useTimestamps = false;

    /*protected $createdField  = 'fecha_emision';
    protected $updatedField  = 'fecha_update';
    protected $deletedField  = 'deleted_at';
    */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function allDatosProv($orden)
    {
        $this->select('id_orden,
        proveedor_fk AS id_proveedor, 
        e.rut_empresa AS rut_emp,
        e.dvempresa AS dv_emp,
        p.rubro AS rubro,
        e.razon_social AS razon,
        e.telefono AS telefono,
        e.giro AS giro');
        $this->join('proveedor as p', 'orden_de_compra.proveedor_fk=p.id_proveedor');
        $this->join('usuario as u', 'p.usuario_fk=u.id_usuario');
        $this->join('datos_personales as dp', 'u.rut_fk=dp.rut');
        $this->join('empresa as e', 'dp.rut=e.DATOS_PERSONALES_rut');
        $this->where('id_orden', $orden);
        return $this->first();
    }


    public function obtProductosSoli($id_orden)
    {
        $this->select('p.id_producto AS id_pro,
        p.nombre AS nombre, 
        p.marca AS marca, 
        p.precio_costo AS precio, 
        dc.cantidad AS cantidad,
        dc.valor_total AS total,
        dc.valor_total');
        $this->join('detalle_orden_de_compra as dc', 'orden_de_compra.id_orden=dc.n_orden_pk');
        $this->join('producto as p', 'dc.id_producto_pk=p.id_producto');
        $this->where('id_orden', $id_orden);
        return $this->findAll();
    }
}
