<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// use App\Models\PesertaModel;
use Config\Services;

class Dashboard extends BaseController
{
    // protected $PesertaModel;

    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'title' => 'Ecommerce',
            'cart' => \Config\Services::cart(),
        ];
        return view('index', $data);
    }
}
