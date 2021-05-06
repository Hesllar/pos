<?php

namespace App\Models;
use CodeIgniter\Model;

class NotaCreditoModel extends Model
{

    protected $table      = 'nota_credito';
    protected $primaryKey = 'id_nota_credito';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['motivo',
                                'total_credito'
                                ];

    protected $useTimestamps = false;
    /*
    protected $createdField  = 'fecha_venta';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
?>