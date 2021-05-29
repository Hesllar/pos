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
        'valor_neto',
        'valor_iva',
        'total',
        'despacho',
        'estado_venta',
        'conversion_moneda',
        'empleado_fk',
        'cliente,fk',
        'forma_pago_fk',
    ];

    protected $useTimestamps = false;
    protected $createdField  = 'fecha_venta';
    /*
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;




    public function todasLasVentas()
    {
        return $this->where('estado_venta', 1)->countAllResults();
    }
}
