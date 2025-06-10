<?php 
namespace App\Controllers;

use App\Models\barangModel;
use Ramsey\Uuid\Uuid;

class Barang extends BaseController
{
    protected $barangModel;
    public function __construct()
    {
        $this->barangModel = new barangModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Barang',
            'main_menu' => 'Master Barang',
            'menu_aktif' => 'Barang',
            'validation' => \Config\Services::validation(),
            'barang' => $this->barangModel->getBarang()
        ];
        return view('Admin/Barang/index', $data);
    }

    public function Simpan()
    {
        if (!$this->validate([
            'nama_barang' => [
                'rules' => 'required|is_unique[barang.nama_barang]',
                'errors' => [
                    'required' => '{field} barang harus diisi.',
                    'is_unique' => '{field} barang sudah terdaftar.'
                ]
            ]
        ])) {
            session()->setFlashdata('error','Nama barang sudah terdaftar.');
            return redirect()->to('/Barang')->withInput();
        }
        $this->barangModel->insert([
            'id_barang' => Uuid::uuid4()->toString(),
            'nama_barang' => $this->request->getVar('nama_barang')
        ]);
        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        return redirect()->to('/Barang');
    }

    public function edit($id_barang)
    {
        $data = [
            'title' => 'Form Ubah Data Barang',
            'barang' => $this->barangModel->getBarang($id_barang)
        ];
        return view('barang/edit', $data);
    }

    public function update()
    {
        $id_barang = $this->request->getVar('id_barang');
        $data_lama = $this->barangModel->getBarang($id_barang);
        if($data_lama['nama_barang'] != $this->request->getVar('nama_barang')) {
            if (!$this->validate([
                'nama_barang' => [
                    'rules' => 'required|is_unique[barang.nama_barang]',
                    'errors' => [
                        'required' => '{field} barang harus diisi.',
                        'is_unique' => '{field} barang sudah terdaftar.'
                    ]
                ]
            ])) {
                session()->setFlashdata('error','Nama barang sudah terdaftar.');
                return redirect()->to('/Barang')->withInput();
            }
        }
        $this->barangModel->save([
            'id_barang' => $id_barang,
            'nama_barang' => $this->request->getVar('nama_barang')
        ]);
        session()->setFlashdata('success', 'Data berhasil diubah.');
        return redirect()->to('/Barang');
    }

    public function Hapus()
    {
        $id_barang = $this->request->getVar('id');
        $this->barangModel->delete($id_barang);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('/Barang');
    }
}
?>