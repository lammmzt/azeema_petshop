<?php

namespace App\Controllers;
use App\Models\layananModel;
use App\Models\usersModel;
use App\Models\transaksiModel;
use App\Models\transaksiDetailModel;


class LandingPage extends BaseController
{
    public function index(): string
    {
        $layananModel = new layananModel();
        $data_layanan = $layananModel->findAll();
        $data = [
            'title' => 'Home | Azema Petshop',
            'menu_aktif' => 'LandingPage',
            'main_menu' => '',
            'validation' => \Config\Services::validation(),
            'data_layanan' => $data_layanan
        ];
        return view('Landing/Home', $data);
    }

    public function Profile(): string
    {
        $usersModel = new usersModel();
        $data_user = $usersModel->where('username', session()->get('username'))->first();
        if (!$data_user) {
            return redirect()->to(base_url('/'));
        }
        $data = [
            'title' => 'Profile | Azema Petshop',
            'menu_aktif' => 'Profile',
            'main_menu' => 'Home',
            'data_user' => $data_user,
            'validation' => \Config\Services::validation()
        ];
        return view('Landing/Profile', $data);
    }

    public function updateProfile(){
        $usersModel = new usersModel();
        $id_user = $this->request->getPost('id_user');
        $data_user = $usersModel->where('id_user', $id_user)->first();
        if($this->request->getPost('username') != $data_user['username']) {
            $rules_username = 'required|is_unique[users.username]';
        } else {
            $rules_username = 'required';
        }
        if (!$this->validate([
            'nama_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi'
                ]
            ],
            'username' => [
                'rules' => $rules_username,
                'errors' => [
                    'required' => '{field} Harus Diisi',
                    'is_unique' => '{field} Sudah Terdaftar'
                ]
            ],
           'alamat_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi'
                ]
            ],
            'no_hp_user' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                    'numeric' => '{field} Harus Angka'
                ]
            ],
            // Add other validation rules as needed
        ])) {
            return redirect()->to('LandingPage/Profile')->withInput();
        }

        $data = [
            "nama_user" => $this->request->getPost('nama_user'),
            "username" => $this->request->getPost('username'),
            "no_hp_user" => $this->request->getPost('no_hp_user'),
            "alamat_user" => $this->request->getPost('alamat_user'),
        ];
        if ($this->request->getPost('old_password') != '' && $this->request->getPost('new_password') != '') {
            if (password_verify($this->request->getPost('old_password'), $data_user['password'])) {
                if ($this->request->getPost('new_password') == $this->request->getPost('old_password')) {
                    session()->setFlashdata('error', 'Password Baru Tidak Boleh Sama Dengan Password Lama');
                    return redirect()->to('LandingPage/Profile')->withInput();
                } else {
                    $data['password'] = password_hash($this->request->getPost('new_password'), PASSWORD_BCRYPT);
                }
            } else {
                session()->setFlashdata('error', 'Password Lama Salah');
                return redirect()->to('LandingPage/Profile')->withInput();
            }
        }
        // update session by username
        $session = session();
        $session->set('username', $this->request->getPost('username'));
        $session->set('nama_user', $this->request->getPost('nama_user'));
        
        $usersModel->update($data_user['id_user'], $data);
        session()->setFlashdata('success', "Profile Berhasil Diupdate");
        return redirect()->to('LandingPage/Profile');
    }
    
    public function Layanan($id){
        $layananModel = new layananModel();
        $data_layanan = $layananModel->where('id_layanan', $id)->first();
        $all_layanan = $layananModel->where('id_layanan !=', $id)->findAll();
        if (!$data_layanan) {
            return redirect()->to(base_url('/'));
        }
        $data = [
            'title' => 'Layanan | Azema Petshop',
            'menu_aktif' => 'Layanan',
            'main_menu' => 'Home',
            'data_layanan' => $data_layanan,
            'all_layanan' => $all_layanan,
            'validation' => \Config\Services::validation()
        ];
        return view('Landing/Layanan', $data);
    }

    public function Keranjang(){
        $data = [
            'title' => 'Keranjang | Azema Petshop',
            'menu_aktif' => 'Keranjang',
            'main_menu' => 'Home',
            'validation' => \Config\Services::validation()
        ];
        return view('Landing/Keranjang', $data);
    }
}