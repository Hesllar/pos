<?php

namespace App\Controllers;

class Contacto extends BaseController
{
	public function index()
	{
		echo view('header');
		echo view('contacto');
		echo view('footer');
	}
}
