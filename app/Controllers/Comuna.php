<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ComunaModel;
use CodeIgniter\HTTP\Request;

class Comuna extends BaseController
{
    protected $comuna;
    protected $request;

    public function __construct()
    {
        $this->comuna = new ComunaModel;
    }

    public function index()
    {
    }
    public function action()
    {
        $this->request = \Config\Services::request();
        if ($this->request->getVar('action')) {
            $action = $this->request->getVar('action');
            if ($action == 'get_comuna') {
                $asigComuna = $this->comuna->where('region_fk', $this->request->getVar('id_region'))->findAll();
            }
            echo json_encode($asigComuna);
        }
    }
}
