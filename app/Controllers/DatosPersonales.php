<?php

namespace App\Controllers;

use App\Models\DatosPersonalesModel;
use App\Models\RegionModel;
use App\Models\DireccionModel;



class DatosPersonales extends BaseController
{
	protected $datospersonales;
	protected $region;
	protected $direccion;
	protected $request;

	public function __construct()
	{
		$this->direccion = new DireccionModel;
		$this->region = new RegionModel;
		$this->datospersonales = new DatosPersonalesModel;
	}

	public function index()
	{
	}


	public function insertarDatosPerso($id, $dv, $nombre, $apellidos, $email, $celular, $juridico)
	{
		$this->request = \Config\Services::request();
		$this->datospersonales->save([
			'rut' => $id,
			'dv' => $dv,
			'nombres' => $nombre,
			'apellidos' => $apellidos,
			'correo' => $email,
			'celular' => $celular,
			'natural_juridico' => $juridico,
			'direccion_fk' => $this->buscarIdDireccion()
		]);
	}
	public function buscarIdPerso($idRut)
	{
		/*$this->datospersonales->select('rut');
		$this->datospersonales->where('rut', $idRut);
		$this->datospersonales->orderBy('fecha_creacion', 'DESC')->First();*/
	}

	public function listar()
	{
		$datospersonales = $this->datospersonales->FindAll();
		return $datospersonales;
	}
	public function insertarDireccion($ciudad, $calle, $numero, $comuna)
	{
		$this->direccion->save([
			'ciudad' => $ciudad,
			'calle' => $calle,
			'numero' => $numero,
			'comuna_fk' => $comuna
		]);
	}

	public function buscarIdDireccion()
	{
		$buscarid =  $this->direccion->orderBy('id_direccion', 'DESC')->First();
		return $buscarid['id_direccion'];
	}
}
