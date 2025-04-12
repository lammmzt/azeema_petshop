<?php

namespace App\Controllers;
use App\Models\layananModel;

class LandingPage extends BaseController
{
    public function index(): string
    {
        $layananModel = new layananModel();
        $data_layanan = $layananModel->findAll();
        $data = [
            'title' => 'Azema Petshop',
            'menu_aktif' => 'LandingPage',
            'main_menu' => '',
            'validation' => \Config\Services::validation(),
            'data_layanan' => $data_layanan
        ];
        return view('Landing/index', $data);
    }
}