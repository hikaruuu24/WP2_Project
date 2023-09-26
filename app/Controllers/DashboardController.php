<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        return view('index', $data);
    }
    public function login()
    {
        return view('Auth/login');
    }
}
