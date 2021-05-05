<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		echo view('header');
		echo view('index');
		echo view('footer');
	}

	public function contacto()
	{
		echo view('header');
		echo view('contacto');
		echo view('footer');
	}
}
