<?php 
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\usersModel;
use CodeIgniter\HTTP\ResponseInterface;
use Ramsey\Uuid\Uuid;
class Auth extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login - Az-Petshop',
            'active' => 'Login',
        ];
        if(session()->get('logged_in')){
            return redirect()->to(base_url('/'));
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

    public function Register()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $nama_user = $this->request->getPost('nama_user');
        $no_hp = $this->request->getPost('no_hp_user');
        $alamat = $this->request->getPost('alamat_user');
        $model = new usersModel();

        $user = $model->where('username', $username)->first();
        if($user){
            return $this->response->setJSON([
                'error' => true,
                'status' => 409,
                'message' => 'Email Sudah Terdaftar'
            ]);
        }else{
            $model->insert([
                'id_user' => Uuid::uuid4()->toString(),
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'nama_user' => $nama_user,
                'role' => '3',
                'no_hp_user' => $no_hp,
                'alamat_user' => $alamat,
            ]);
            return $this->response->setJSON([
                'error' => false,
                'status' => 200,
                'message' => 'Registrasi Berhasil'
            ]);
        }
        
    }

    public function loginUser(){
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
                return $this->response->setJSON([
                    'error' => false,
                    'status' => 200,
                    'message' => 'Login Berhasil',
                ]);
            }else{
                return $this->response->setJSON([
                    'error' => true,
                    'status' => 401,
                    'message' => 'Password Salah'
                ]);
            }
        }else{
            return $this->response->setJSON([
                'error' => true,
                'status' => 404,
                'message' => 'Email Tidak Ditemukan'
            ]);
        }
    }
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('LandingPage'));
    }
}


?>