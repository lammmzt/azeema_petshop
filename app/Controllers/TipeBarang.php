<?php 
namespace App\Controllers;

use App\Models\barangModel;
use App\Models\tipeBarangModel;
use App\Models\detailStokTipeBarangModel;

class TipeBarang extends BaseController
{
    protected $tipeBarangModel;
    protected $barangModel;
    protected $detailStokTipeBarangModel;

    public function __construct()
    {
        $this->tipeBarangModel = new tipeBarangModel();
        $this->barangModel = new barangModel();
        $this->detailStokTipeBarangModel = new detailStokTipeBarangModel();
    }

    public function index($id_barang = null)
    {
        $data_barang = $this->barangModel->getBarang($id_barang);
        $tipe_barang = $this->tipeBarangModel->getTipeBarangByBarang($id_barang);
        if( !$data_barang) {
            session()->setFlashdata('error', 'Barang tidak ditemukan.');
            return redirect()->to('Barang');
        }
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
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} barang harus diisi.',
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
        // Cek apakah tipe barang sudah ada
        $existingTipe = $this->tipeBarangModel->where('merk_tipe_barang', $this->request->getVar('merk_tipe_barang'))
            ->where('id_barang', $this->request->getVar('id_barang'))
            ->first();
        if ($existingTipe) {
            session()->setFlashdata('error', 'Tipe barang dengan merk tersebut sudah ada.');
            return redirect()->to('TipeBarang/' .  $this->request->getVar('id_barang'))->withInput();
        }
        $this->tipeBarangModel->save([
            'merk_tipe_barang' => $this->request->getVar('merk_tipe_barang'),
            'id_barang' => $this->request->getVar('id_barang'),
            'harga_tipe_barang' => $this->request->getVar('harga_tipe_barang'),
            'satuan' => $this->request->getVar('satuan')
        ]);
        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        return redirect()->to('TipeBarang/' .  $this->request->getVar('id_barang'));
    }

    public function update()
    {
        $id_tipe_barang = $this->request->getVar('id_tipe_barang');
        $data_lama = $this->tipeBarangModel->find($id_tipe_barang);
        if ($data_lama['merk_tipe_barang'] != $this->request->getVar('merk_tipe_barang')) {
            // Cek apakah tipe barang sudah ada
            $existingTipe = $this->tipeBarangModel->where('merk_tipe_barang', $this->request->getVar('merk_tipe_barang'))
                ->where('id_barang', $this->request->getVar('id_barang'))
                ->first();
            if ($existingTipe) {
                session()->setFlashdata('error', 'Tipe barang dengan merk tersebut sudah ada.');
                return redirect()->to('TipeBarang/' .  $this->request->getVar('id_barang'))->withInput();
            }
        }
        $this->tipeBarangModel->save([
            'id_tipe_barang' => $id_tipe_barang,
            'id_barang' => $this->request->getVar('id_barang'),
            'merk_tipe_barang' => $this->request->getVar('merk_tipe_barang'),
            'harga_tipe_barang' => $this->request->getVar('harga_tipe_barang'),
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

    public function detail_stok($id_tipe_barang = null)
    {
        $tipe_barang = $this->tipeBarangModel->getTipeBarang($id_tipe_barang);
        $detail_stok = $this->detailStokTipeBarangModel->getStokTipeBarangByIdTipeBarang($id_tipe_barang);
        if (!$tipe_barang) {
            session()->setFlashdata('error', 'Tipe barang tidak ditemukan.');
            return redirect()->back();
        }
        $data = [
            'title' => 'Daftar Stok Tipe Barang',
            'main_menu' => 'Barang',
            'menu_aktif' => 'Barang',
            'validation' => \Config\Services::validation(),
            'tipe_barang' => $tipe_barang,
            'detail_stok' => $detail_stok
        ];

        return view('Admin/DetailTipebarang/index', $data);
    }

    public function UpdateDetail()
    {
        if (!$this->validate([
            'id_detail_stok_tipe_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'jumlah_detail_stok_tipe_barang' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'numeric' => '{field} harus berupa angka.'
                ]
            ],
            'harga_detail_stok_tipe_barang' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'numeric' => '{field} harus berupa angka.'
                ]
            ],
            'harga_beli_detail_stok_tipe_barang' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'numeric' => '{field} harus berupa angka.'
                ]
            ],
            
        ])) {
            session()->setFlashdata('error', 'Data gagal diubah.');
            return redirect()->to('TipeBarang/detail_stok/' . $this->request->getVar('id_tipe_barang'))->withInput();
        }

        $this->detailStokTipeBarangModel->save([
            'id_detail_stok_tipe_barang' => $this->request->getVar('id_detail_stok_tipe_barang'),
            'jumlah_detail_stok_tipe_barang' => $this->request->getVar('jumlah_detail_stok_tipe_barang'),
            'harga_detail_stok_tipe_barang' => $this->request->getVar('harga_detail_stok_tipe_barang'),
            'harga_beli_detail_stok_tipe_barang' => $this->request->getVar('harga_beli_detail_stok_tipe_barang'),
            // Exp bisa kosong
            'exp_detail_stok_tipe_barang' => $this->request->getVar('exp_detail_stok_tipe_barang') ?: null
        ]);
        session()->setFlashdata('success', 'Data berhasil diubah.');
        return redirect()->to('TipeBarang/detail_stok/' . $this->request->getVar('id_tipe_barang'));
    }
}

?>