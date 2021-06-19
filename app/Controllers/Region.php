<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RegionModel;

class Region extends BaseController
{
    protected $region;
    protected $request;

    public function __construct()
    {
        $this->region = new RegionModel;
    }

    public function index()
    {
    }

    public function listarRegiones()
    {

        return json_encode($this->region->findAll());
    }

    public function listarRegionesDespacho()
    {
        return json_encode($this->region->where('id_region', 6)->first());
    }
}
