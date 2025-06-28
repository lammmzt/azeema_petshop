<?php

namespace App\Controllers;

use App\Models\usersModel;
use Ramsey\Uuid\Uuid;

class Users extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new usersModel();
    }

    public function index()
    {
        if(session()->get('role') == '1') {
            $data_user = $this->userModel->where('role !=', '3')->findAll();
         }else{
            $data_user = $this->userModel->where('role', '3')->findAll();
         }
        $data = [
            'title' => 'Users',
            'subtitle' => 'Data Users',
            'main_menu' => 'Users',
            'menu_aktif' => 'Users',
            'users' => $data_user,
            'validation' => \Config\Services::validation(),
            
        ];
        return view('Admin/Users/index', $data);
    }

    public function Simpan()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                    'is_unique' => '{field} Sudah Terdaftar'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'nama_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi'
                ]
            ],

            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi'
                ]
            ]
        ])) {
            return redirect()->to('/Users')->withInput();
        }
        $this->userModel->insert([
            'id_user' => Uuid::uuid4()->toString(),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'nama_user' => $this->request->getVar('nama_user'),
            'role' => $this->request->getVar('role'),
            'no_hp_user' => $this->request->getVar('no_hp_user'),
            'alamat_user' => $this->request->getVar('alamat_user'),
        ]);
        session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
        return redirect()->to('Users');
    }

    public function Update()
    {
        $id = $this->request->getVar('id_user');
        $password = $this->request->getVar('password');
        if ($password == '') {
            $password = $this->request->getVar('password_lama');
        } else {
            $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }
        $this->userModel->save([
            'id_user' => $id,
            'username' => $this->request->getVar('username'),
            'password' => $password,
            'nama_user' => $this->request->getVar('nama_user'),
            'role' => $this->request->getVar('role'),
            'no_hp_user' => $this->request->getVar('no_hp_user'),
            'alamat_user' => $this->request->getVar('alamat_user'),
        ]);
        session()->setFlashdata('success', 'Data Berhasil Diubah');
        return redirect()->to('Users');
    }

    public function Hapus()
    {
        $id = $this->request->getVar('id');
        $this->userModel->delete($id);
        if ($this->userModel->delete($id)) {
            session()->setFlashdata('success', 'Data Berhasil Dihapus');
            return redirect()->to('/Users');
        } else {
            session()->setFlashdata('error', 'Data Gagal Dihapus');
            return redirect()->to('/Users');
        }
    }
}