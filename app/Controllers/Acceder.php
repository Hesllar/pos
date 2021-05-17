<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfiguracionModel;

class Acceder extends BaseController
{
	protected $configuracion;

    public function __construct()
    {
        $this->configuracion = new ConfiguracionModel;
    }

	public function index(){
		$configuracion = $this->configuracion->First();
		$data = ['configuracion'=>$configuracion];
		echo view ('header',$data);
		echo view ('acceder');
		echo view ('footer');
	}

}