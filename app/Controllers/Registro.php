<?php

namespace App\Controllers;

class Registro extends BaseController
{
	public function index()
	{
		echo view('header');
		echo view('registro');
		echo view('footer');
	}
	
}
