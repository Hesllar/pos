<?php

namespace App\Controllers;

use App\Models\FormaPagoModel;
use App\Models\ConfiguracionModel;
use Transbank\Webpay\WebpayPlus\Transaction;


class FormaPago extends BaseController
{
	
	protected $configuracion;
	protected $fpagos;

	public function __construct()
	{
		
		$this->fpagos = new FormaPagoModel;
		$this->configuracion = new ConfiguracionModel;
	}

	public function index()
	{
		
		
	}

	public function listar()
	{
		$fpagos = $this->fpagos->FindAll();
		return $fpagos;
	}

	public function buscarPorId($id_pago)
	{
		$fpagos = $this->fpagos->where('id_forma_pago',$id_pago)->First();
		return $fpagos;
	}
	public function pago()
	{
		

			$configuracion = $this->configuracion->first();
			$data = ['configuracion' => $configuracion];
			echo view('header', $data);
			echo view('/Productos/pago');
			echo view('footer');
		
	}
	
	
}
