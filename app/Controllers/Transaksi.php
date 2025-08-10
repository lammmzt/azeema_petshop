<?php 
namespace App\Controllers;

use App\Models\transaksiModel;
use App\Models\detailTransaksiModel;
use App\Models\barangModel;
use App\Models\tipeBarangModel;
use App\Models\detailStokTipeBarangModel;
use Ramsey\Uuid\Uuid;

class Transaksi extends BaseController
{
    protected $transaksiModel;
    protected $detailTransaksiModel;
    protected $barangModel;
    protected $tipeBarangModel;

    public function __construct() 
    {
        $this->transaksiModel = new transaksiModel();
        $this->detailTransaksiModel = new detailTransaksiModel();
        $this->barangModel = new barangModel();
        $this->tipeBarangModel = new tipeBarangModel();
        $this->detailStokTipeBarangModel = new detailStokTipeBarangModel();
    }


    // ================================== TRANSAKSI MASUK ==================================
    public function Masuk() // Menampilkan halaman daftar transaksi masuk
    {
        $data = [ // Data yang akan dikirim ke view
            'title' => 'Daftar Transaksi Masuk',
            'main_menu' => 'Transaksi',
            'menu_aktif' => 'trasaksi_masuk',
            'validation' => \Config\Services::validation(),
            'transaksi_masuk' => $this->transaksiModel->getTransaksiByJenis('0'),
        ];
        return view('Admin/Transaksi/Masuk/index', $data); // Load view
    }

    public function tambah_transaksi_masuk() // Menampilkan halaman tambah transaksi masuk
    {
        $data = [ // Data yang akan dikirim ke view
            'title' => 'Tambah Transaksi Masuk',
            'main_menu' => 'Transaksi',
            'menu_aktif' => 'transaksi_masuk',
            'validation' => \Config\Services::validation(),
            'tipe_barang' => $this->tipeBarangModel->getTipeBarang(), // Mengambil data tipe barang
        ];
        
        return view('Admin/Transaksi/Masuk/tambah', $data); // Load view
    }

    public function simpan_transaksi_masuk() // Proses simpan transaksi masuk
    {
        $id_transaksi = 'TRM-' . date('Ymdhis') .rand(100,999); // Generate id transaksi
        $data = [ // Data yang akan disimpan
            'id_transaksi' => $id_transaksi,
            'tanggal_transaksi' => $this->request->getPost('tanggal_transaksi'),
            'ket_transaksi' => $this->request->getPost('ket_transaksi'),
            'total_transaksi' => $this->request->getPost('total_transaksi'),
            'jenis_transaksi' => '0',
            'status_transaksi' => '1',
        ];

        $this->transaksiModel->insert($data); // Simpan data transaksi
        $data_barang = $this->request->getPost('data_barang'); // Mengambil data id tipe barang
        $data_barang = json_decode($data_barang, true); // Decode data json

        foreach ($data_barang as $key => $value) { // Looping data barang
            $data_detail_stok_tipe_barang = [ // Data yang akan disimpan
                'id_tipe_barang' => $value['id_tipe_barang'],
                'harga_detail_stok_tipe_barang' => $value['harga_jual'],
                'harga_beli_detail_stok_tipe_barang' => $value['harga'],
                'jumlah_detail_stok_tipe_barang' => $value['jumlah'],
                'exp_detail_stok_tipe_barang' => $value['exp_barang'] ?? null,
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $this->detailStokTipeBarangModel->save($data_detail_stok_tipe_barang); // Simpan data detail stok tipe barang
            $id_detail_stok_tipe_barang = $this->detailStokTipeBarangModel->insertID(); // Mendapatkan id detail stok tipe barang yang baru saja disimpan
            // update harga tipe barang
            $this->tipeBarangModel->update($value['id_tipe_barang'], ['harga_tipe_barang' => $value['harga']]); // Update harga tipe barang
            $data_detail_transaksi = [ // Data yang akan disimpan
                'id_transaksi' => $id_transaksi,
                'id_detail_stok_tipe_barang' => $id_detail_stok_tipe_barang,
                'jumlah_transaksi' => $value['jumlah'],
                'sub_total_transaksi' => $value['subtotal'],
                'harga_barang' => $value['harga'],
            ];

            $this->detailTransaksiModel->save($data_detail_transaksi); // Simpan data detail transaksi
                
        }
        session()->setFlashdata('success', 'Data transaksi masuk berhasil disimpan'); // Set flashdata
        
        // set response json
        $response = [
            'status' => '200',
            'pesan' => 'Data transaksi masuk berhasil disimpan',
        ];

        return $this->response->setJSON($response); // Load view

    }

    // ================================== TRANSAKSI KELUAR ==================================
    public function Keluar() // Menampilkan halaman daftar transaksi keluar
    {
        $data = [ // Data yang akan dikirim ke view
            'title' => 'Daftar Transaksi Keluar',
            'main_menu' => 'Transaksi',
            'menu_aktif' => 'trasaksi_keluar',
            'validation' => \Config\Services::validation(),
            'transaksi_keluar' => $this->transaksiModel->getTransaksiByJenis('1'),
        ];
        return view('Admin/Transaksi/Keluar/index', $data); // Load view
    }

    public function tambah_transaksi_keluar() // Menampilkan halaman tambah transaksi keluar
    {
        $data = [ // Data yang akan dikirim ke view
            'title' => 'Tambah Transaksi Keluar',
            'main_menu' => 'Transaksi',
            'menu_aktif' => 'transaksi_keluar',
            'validation' => \Config\Services::validation(),
            'detail_stok_tipe_barang' => $this->detailStokTipeBarangModel->getStokTipeBarangActive(), // Mengambil data detail stok tipe barang
        ];
        
        return view('Admin/Transaksi/Keluar/tambah', $data); // Load view
    }

    public function simpan_transaksi_keluar() // Proses simpan transaksi keluar
    {
        $id_transaksi = 'TRK-' . date('Ymdhis') .rand(100,999); // Generate id transaksi
        $data = [ // Data yang akan disimpan
            'id_transaksi' => $id_transaksi,
            'tanggal_transaksi' => $this->request->getPost('tanggal_transaksi'),
            // 'ket_transaksi' => $this->request->getPost('ket_transaksi'),
            'total_transaksi' => $this->request->getPost('total_transaksi'),
            'jenis_transaksi' => '1',
            'status_transaksi' => '1',
        ];

        $this->transaksiModel->insert($data); // Simpan data transaksi
        $data_barang = $this->request->getPost('data_barang'); // Mengambil data id tipe barang
        $data_barang = json_decode($data_barang, true); // Decode data json

        foreach ($data_barang as $key => $value) { // Looping data barang

            $data_detail_transaksi = [ // Data yang akan disimpan
                'id_transaksi' => $id_transaksi,
                'id_detail_stok_tipe_barang' => $value['id_detail_stok_tipe_barang'],
                'jumlah_transaksi' => $value['jumlah'],
                'sub_total_transaksi' => $value['subtotal'],
                'harga_barang' => $value['harga'],
            ];

            $this->detailTransaksiModel->save($data_detail_transaksi); // Simpan data detail transaksi
            $tipe_barang = $this->detailStokTipeBarangModel->getStokTipeBarang($value['id_detail_stok_tipe_barang']); // Mengambil data stok tipe barang berdasarkan id detail stok tipe barang
            if (!$tipe_barang) {
                return $this->response->setJSON(['status' => '404', 'pesan' => 'Data stok tipe barang tidak ditemukan']);
            }
            if ($tipe_barang['jumlah_detail_stok_tipe_barang'] < $value['jumlah']) { // Mengecek apakah stok barang cukup
                return $this->response->setJSON(['status' => '400', 'pesan' => 'Stok barang tidak cukup']);
            }
            $stok = $tipe_barang['jumlah_detail_stok_tipe_barang'] - $value['jumlah']; // Menghitung stok barang
            $this->detailStokTipeBarangModel->update($value['id_detail_stok_tipe_barang'], ['jumlah_detail_stok_tipe_barang' => $stok]); // Update stok barang
                
        }
        session()->setFlashdata('success', 'Data transaksi masuk berhasil disimpan'); // Set flashdata
        
        // set response json
        $response = [
            'status' => '200',
            'pesan' => 'Data transaksi keluar berhasil disimpan',
        ];

        return $this->response->setJSON($response); // Load view

    }

    // ================================== PRINT STRUK ==================================
    public function print_struk($id_transaksi) // Menampilkan halaman print struk 
    {
        $data = [ // Data yang akan dikirim ke view
            'title' => 'Print Struk Transaksi',
            'transaksi' => $this->transaksiModel->getTransaksi($id_transaksi),
            'detail_transaksi' => $this->detailTransaksiModel->getDetailTransaksiByTransaksi($id_transaksi),
        ];
        // dd($data);

        return view('Admin/Transaksi/print_struk', $data); // Load view

    }
}
?>