<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\usersModel;

class Middleware implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('LandingPage');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $model = new usersModel();
        $user = $model->where('username', session()->get('username'))->first();
        if ($user['role'] != 'Admin') {
            return redirect()->to('/forbidden/index');
        }
    }
}