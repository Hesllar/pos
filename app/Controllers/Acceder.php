<?php

namespace App\Controllers;

class Acceder extends BaseController
{
	public function index()
	{
		echo view('header');
		echo view('acceder');
		echo view('footer');
	}
	
}
