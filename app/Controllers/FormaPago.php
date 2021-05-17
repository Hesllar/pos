<?php

namespace App\Controllers;

use App\Models\FormaPagoModel;

class FormaPago extends BaseController
{
	protected $fpagos;

	public function __construct()
	{
		$this->fpagos = new FormaPagoModel;
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
	
}
