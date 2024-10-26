<?php 
namespace App\Controllers;

use App\Models\tipeBarangModel;
use App\Models\barangModel;

class TipeBarang extends BaseController
{
    protected $tipeBarangModel;
    protected $barangModel;
    
    public function __construct()
    {
        $this->tipeBarangModel = new tipeBarangModel();
        $this->barangModel = new barangModel();
    }

    public function index($id_barang = null)
    {
        $data_barang = $this->barangModel->getBarang($id_barang);
        $tipe_barang = $this->tipeBarangModel->getTipeBarangByBarang($id_barang);
        
        $data = [
            'title' => 'Daftar Tipe Barang',
            'main_menu' => 'Barang',
            'menu_aktif' => 'Barang',
            'validation' => \Config\Services::validation(),
            'tipe_barang' => $tipe_barang,
            'barang' => $data_barang
        ];

        return view('Admin/TipeBarang/index', $data);
    }

    public function Simpan()
    {
        if (!$this->validate([
            'merk_tipe_barang' => [
                'rules' => 'required|is_unique[tipe_barang.merk_tipe_barang]',
                'errors' => [
                    'required' => '{field} barang harus diisi.',
                    'is_unique' => '{field} barang sudah terdaftar.'
                ]
                ],
            'id_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} barang harus diisi.'
                ]
                ],
            'harga_tipe_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} barang harus diisi.'
                ]
                ],
            'stok_tipe_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} barang harus diisi.'
                ]
                ],
            'satuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} barang harus diisi.'
                ]
                    ]
                
        ])) {
            session()->setFlashdata('error','Data gagal ditambahkan.');
            return redirect()->to('TipeBarang/' .  $this->request->getVar('id_barang'))->withInput();
        }
        $this->tipeBarangModel->save([
            'merk_tipe_barang' => $this->request->getVar('merk_tipe_barang'),
            'id_barang' => $this->request->getVar('id_barang'),
            'harga_tipe_barang' => $this->request->getVar('harga_tipe_barang'),
            'stok_tipe_barang' => $this->request->getVar('stok_tipe_barang'),
            'satuan' => $this->request->getVar('satuan')
        ]);
        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        return redirect()->to('TipeBarang/' .  $this->request->getVar('id_barang'));
    }

    public function update()
    {
        $id_tipe_barang = $this->request->getVar('id_tipe_barang');
        $this->tipeBarangModel->save([
            'id_tipe_barang' => $id_tipe_barang,
            'id_barang' => $this->request->getVar('id_barang'),
            'merk_tipe_barang' => $this->request->getVar('merk_tipe_barang'),
            'harga_tipe_barang' => $this->request->getVar('harga_tipe_barang'),
            'stok_tipe_barang' => $this->request->getVar('stok_tipe_barang'),
            'satuan' => $this->request->getVar('satuan')
        ]);
        session()->setFlashdata('success', 'Data berhasil diubah.');
        return redirect()->to('TipeBarang/' . $this->request->getVar('id_barang'));
    }

    public function Hapus()
    {
        $id_tipe_barang = $this->request->getVar('id');
        $id_barang = $this->request->getVar('id_barang');
        $this->tipeBarangModel->delete($id_tipe_barang);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('TipeBarang/' . $id_barang);
    }

    public function getTipeBarangByBarang($id_barang)
    {
        $data = $this->tipeBarangModel->getTipeBarangByBarang($id_barang);
        return json_encode($data);
    }
}

?>