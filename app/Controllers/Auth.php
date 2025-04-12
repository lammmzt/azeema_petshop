<?php 
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\usersModel;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login - Az-Petshop',
            'active' => 'Login',
        ];
        if(session()->get('logged_in')){
            return redirect()->to(base_url('Dashboard'));
        }else{
            return view('Template/auth', $data);
        }
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        // dd($username, $password);
        $model = new usersModel();
        $user = $model->where('username', $username)->first();

        if($user){
            
            if(password_verify($password, $user['password'])){
                $ses_data = [
                    'username' => $user['username'],
                    'nama_user' => $user['nama_user'],
                    'role' => $user['role'],
                    'logged_in' => TRUE,
                ];
                session()->set($ses_data);
                session()->setFlashdata('success', 'Login Berhasil');
                return redirect()->to(base_url('/'));
            }else{
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->to(base_url('Auth'))->withInput();
            }
        }else{
            session()->setFlashdata('error', 'Username Tidak Ditemukan');
            return redirect()->to(base_url('Auth'))->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('Auth'));
    }
}


?>