<?php

namespace App\Controllers;

class Acerca extends BaseController
{
	public function index()
	{
		echo view('header');
		echo view('acerca');
		echo view('footer');
	}
	
}
