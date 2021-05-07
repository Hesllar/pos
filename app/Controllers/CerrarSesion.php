<?php

namespace App\Controllers;

use App\Models\ConfiguracionModel;
use App\Controllers\BaseController;

class CerrarSesion extends BaseController
{

    public function __construct()
    {
        $this->configuracion = new ConfiguracionModel;
    }


    public function index()
    {

        $configuracion = $this->configuracion->First();
        $data = ['titulo' => 'Usuarios', 'configuracion' => $configuracion];


        echo view('header', $data);
        echo view('acceder');
        echo view('footer', $data);
    }
}
