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

	//Aqui se Insertan Datos para un nuevo Usuario
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

	//Aqui se Insertan Datos para un nuevo Proveedor
	public function insertarDatosProveedor($id, $dv, $nombre, $apellidos, $email, $celular)
	{
		$this->request = \Config\Services::request();
		$this->datospersonales->save([
			'rut' => $id,
			'dv' => $dv,
			'nombres' => $nombre,
			'apellidos' => $apellidos,
			'correo' => $email,
			'celular' => $celular,
			'natural_juridico' => 1,
			'direccion_fk' => $this->buscarIdDireccion()
		]);
	}

	public function buscarPorRut($idRut)
	{
		$this->datospersonales->select('*');
		$datoPersonal = $this->datospersonales->where('rut', $idRut)->First();
		$direccion = $this->direccion->select()->where('id_direccion', $datoPersonal['direccion_fk'])->First();
		return json_encode(array_merge($datoPersonal,$direccion));
	}

	public function buscarPorRutDv($idRut,$dv)
	{
		$this->datospersonales->select('*');
		$datoPersonal = $this->datospersonales->where('rut', $idRut)->where('dv', $dv)->First();
		return json_encode($datoPersonal);
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

	public function insertarDireccionProveedor($ciudad, $calle, $numero, $comuna)
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

	public function insertarDatosAjax()
	{
		$this->request = \Config\Services::request();
		$this->datospersonales->save([
			'rut' => $this->request->getVar('c_rut'),
			'dv' => $this->request->getVar('c_dv'),
			'nombres' => $this->request->getVar('c_nombre'),
			'apellidos' => $this->request->getVar('c_apellidos'),
			'correo' => $this->request->getVar('c_correo'),
			'celular' => $this->request->getVar('c_celular'),
			'natural_juridico' => 0,
			'direccion_fk' => $this->request->getVar('c_direccion_id')
		]);
	}

	public function naturalJuridico($rut,$estado)
	{
		$this->datosPersonales->update($rut, [
			'natural_juridico' => $estado
		]);
	}

}
