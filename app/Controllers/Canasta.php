<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VentaModel;

        

class Canasta extends BaseController
{
	protected $canasta;
    protected $request;

	public function __construct()
	{
		$this->canasta = new VentaModel;
	}

	public function index()
	{

		echo view('header');
		echo view('Productos/Canasta');
		echo view('footer');
	}
	
	public function nuevaCompra()
	{
        $this->request = \Config\Services::request();
        $ec = $this->request->getPost('tt');
        /*
        $ec = $this->request->getPost('id_prod_carrito');
        $ec = $this->request->getPost('cantidad');
        */
        echo($this->request->getPost('id_prod_carrito'));
        echo("<br>");
        echo($this->request->getPost('cantidadComprar'));
        echo("<br>");
	}
}