<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Dashboard',
            'menu_aktif' => 'Dashboard',
            'subtitle' => '',
        ];
        return view('Admin/Dashboard/index', $data);
    }
}