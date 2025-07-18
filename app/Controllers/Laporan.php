<?php 
namespace App\Controllers;

use App\Models\transaksiModel;
use App\Models\detailTransaksiModel;
use App\Models\orderModel;
use App\Models\detailOrderModel;
use App\Models\barangModel;
use App\Models\tipeBarangModel;
use App\Models\detailStokTipeBarangModel;
use Ramsey\Uuid\Uuid;

class Laporan extends BaseController
{
    protected $transaksiModel;
    protected $detailTransaksiModel;
    protected $barangModel;
    protected $tipeBarangModel;
    protected $orderModel;
    protected $detailOrderModel;

    public function __construct() 
    {
        $this->transaksiModel = new transaksiModel();
        $this->detailTransaksiModel = new detailTransaksiModel();
        $this->barangModel = new barangModel();
        $this->tipeBarangModel = new tipeBarangModel();
        $this->orderModel = new orderModel();
        $this->detailOrderModel = new detailOrderModel();
        $this->detailStokTipeBarangModel = new detailStokTipeBarangModel();
    }

    public function Transaksi() // Menampilkan halaman daftar transaksi masuk
    {
        if($this->request->getPost('tgl_awal') && $this->request->getPost('tgl_akhir')) {
            $tgl_awal = $this->request->getPost('tgl_awal');
            $tgl_akhir = $this->request->getPost('tgl_akhir');
            $jenis_transaksi = $this->request->getPost('jenis_transaksi');
            // dd($tgl_awal, $tgl_akhir, $jenis_transaksi);
            if($jenis_transaksi == '' ){
                $data_transaksi = $this->transaksiModel->getLaporanTransaksi($tgl_awal, $tgl_akhir, null); // Ambil data transaksi masuk sesuai filter
            } else {
                $data_transaksi = $this->transaksiModel->getLaporanTransaksi($tgl_awal, $tgl_akhir, $jenis_transaksi); // Ambil data transaksi keluar sesuai filter
            }
        } else {
            $data_transaksi = $this->transaksiModel->getLaporanTransaksi('1999-01-01', '1999-12-31', null); // Ambil semua data transaksi masuk
            $tgl_awal = '';
            $tgl_akhir = '';
            $jenis_transaksi = '';
        }

        $alias_jenis_transaksi = $jenis_transaksi == '0' ? 'Transaksi Masuk' : ($jenis_transaksi == '1' ? 'Transaksi Keluar' : 'Semua Transaksi');
        // dd($data_transaksi);
        $data = [ // Data yang akan dikirim ke view
            'title' => 'Laporan Transaksi',
            'title_laporan' => 'Laporan ' . $alias_jenis_transaksi . ' ' . $tgl_awal . ' s/d ' . $tgl_akhir,
            'main_menu' => 'Laporan',
            'menu_aktif' => 'laporan_transaksi',
            'validation' => \Config\Services::validation(),
            'data_transaksi' => $data_transaksi,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
            'jenis_transaksi' => $jenis_transaksi,
        ];
        return view('Admin/Laporan/Transaksi', $data); // Load view
    }

    public function cetak_transaksi($tgl_awal, $tgl_akhir, $jenis_transaksi)
    {
        
        if($jenis_transaksi == '' ){
            $data_transaksi = $this->transaksiModel->getLaporanTransaksi($tgl_awal, $tgl_akhir, null); // Ambil data transaksi masuk sesuai filter
        } else {
            $data_transaksi = $this->transaksiModel->getLaporanTransaksi($tgl_awal, $tgl_akhir, $jenis_transaksi); // Ambil data transaksi keluar sesuai filter
        }
        $alias_jenis_transaksi = $jenis_transaksi == '0' ? 'Transaksi Masuk' : ($jenis_transaksi == '1' ? 'Transaksi Keluar' : 'Semua Transaksi');
        // dd($data_transaksi);
        $data = [ // Data yang akan dikirim ke view
            'title' => 'Laporan Transaksi',
            'title_laporan' => 'Laporan ' . $alias_jenis_transaksi . ' ' . date('d-m-Y', strtotime($tgl_awal)) . ' s/d ' . date('d-m-Y', strtotime($tgl_akhir)),
            'main_menu' => 'Laporan',
            'menu_aktif' => 'laporan_transaksi',
            'validation' => \Config\Services::validation(),
            'data_transaksi' => $data_transaksi,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
            'jenis_transaksi' => $jenis_transaksi,
        ];
        return view('Admin/Laporan/cetak_transaksi', $data); // Load view
    }

    public function Orderan() // Menampilkan halaman daftar transaksi masuk
    {
        if($this->request->getPost('tgl_awal') && $this->request->getPost('tgl_akhir')) {
            $tgl_awal = $this->request->getPost('tgl_awal');
            $tgl_akhir = $this->request->getPost('tgl_akhir');
            // dd($tgl_awal, $tgl_akhir, $status_order);
            $data_order = $this->orderModel->getLaporan($tgl_awal, $tgl_akhir); // Ambil data transaksi keluar sesuai filter
        } else {
            $data_order = $this->orderModel->getLaporan('1999-01-01', '1999-12-31'); // Ambil semua data transaksi masuk
            $tgl_awal = '';
            $tgl_akhir = '';
            $status_order = '';
        }
        // dd($data_order);
        $data = [ // Data yang akan dikirim ke view
            'title' => 'Laporan Pemesanan',
            'title_laporan' => 'Laporan Pemesanan ' . $tgl_awal . ' s/d ' . $tgl_akhir,
            'main_menu' => 'Laporan',
            'menu_aktif' => 'laporan_orderan',
            'validation' => \Config\Services::validation(),
            'data_order' => $data_order,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
        ];
        return view('Admin/Laporan/Orderan', $data); // Load view
    }

    public function cetak_orderan($tgl_awal, $tgl_akhir) // Menampilkan halaman daftar transaksi masuk
    {
        $data_order = $this->orderModel->getLaporan($tgl_awal, $tgl_akhir); // Ambil data transaksi keluar sesuai filter
        
        // dd($data_order);
        $data = [ // Data yang akan dikirim ke view
            'title' => 'Laporan Pemesanan',
            'title_laporan' => 'Laporan Pemesanan ' . $tgl_awal . ' s/d ' . $tgl_akhir,
            'main_menu' => 'Laporan',
            'menu_aktif' => 'laporan_orderan',
            'validation' => \Config\Services::validation(),
            'data_order' => $data_order,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
        ];
        return view('Admin/Laporan/cetak_orderan', $data); // Load view
    }

    public function Pendapatan() // Menampilkan halaman daftar transaksi masuk
    {
        if($this->request->getPost('tgl_awal') && $this->request->getPost('tgl_akhir')) {
            $tgl_awal = $this->request->getPost('tgl_awal');
            $tgl_akhir = $this->request->getPost('tgl_akhir');
            $jenis_pendapatan = $this->request->getPost('jenis_pendapatan');
            // dd($tgl_awal, $tgl_akhir, $status_order);
            if($this->request->getPost('jenis_pendapatan') == '1') {
                $data_order = $this->orderModel->getLaporan($tgl_awal, $tgl_akhir); // Ambil data transaksi keluar sesuai filter
                $data_transaksi = $this->transaksiModel->getLaporanTransaksi('1999-01-01', '1999-12-31', null); // Ambil semua data transaksi masuk
            }elseif($this->request->getPost('jenis_pendapatan') == '0') {
                $data_order = $this->orderModel->getLaporan('1999-01-01', '1999-12-31'); // Ambil semua data transaksi masuk
                $data_transaksi = $this->transaksiModel->getLaporanTransaksi($tgl_awal, $tgl_akhir, '1'); // Ambil data transaksi masuk sesuai filter
            } else {
                $data_order = $this->orderModel->getLaporan($tgl_awal, $tgl_akhir); // Ambil data transaksi keluar sesuai filter
                $data_transaksi = $this->transaksiModel->getLaporanTransaksi($tgl_awal, $tgl_akhir, '1'); // Ambil data transaksi masuk sesuai filter
            }
        } else {
            $data_order = $this->orderModel->getLaporan('1999-01-01', '1999-12-31'); // Ambil semua data transaksi masuk
            $data_transaksi = $this->transaksiModel->getLaporanTransaksi('1999-01-01', '1999-12-31', null); // Ambil semua data transaksi masuk
            $tgl_awal = '';
            $tgl_akhir = '';
            $status_order = '';
            $jenis_pendapatan = '';
        }
        // dd($data_order, $data_transaksi);


        // dd($data_all_pendapatan);    
        $data = [ // Data yang akan dikirim ke view
            'title' => 'Laporan Pendapatan',
            'title_laporan' => 'Laporan Pendapatan ' . $tgl_awal . ' s/d ' . $tgl_akhir,
            'main_menu' => 'Laporan',
            'menu_aktif' => 'laporan_pendapatan',
            'validation' => \Config\Services::validation(),
            'data_order' => $data_order,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
            'data_transaksi' => $data_transaksi,
            'data_order' => $data_order,
            'jenis_pendapatan' => $jenis_pendapatan,
        ];
        return view('Admin/Laporan/Pendapatan', $data); // Load view
    }

    public function cetak_pendapatan($tgl_awal, $tgl_akhir, $jenis_pendapatan = null) // Menampilkan halaman daftar transaksi masuk
    {
      
        if($jenis_pendapatan == '1') {
            $data_order = $this->orderModel->getLaporan($tgl_awal, $tgl_akhir); // Ambil data transaksi keluar sesuai filter
            $data_transaksi = $this->transaksiModel->getLaporanTransaksi('1999-01-01', '1999-12-31', null); // Ambil semua data transaksi masuk
        }elseif($jenis_pendapatan == '0') {
            $data_order = $this->orderModel->getLaporan('1999-01-01', '1999-12-31'); // Ambil semua data transaksi masuk
            $data_transaksi = $this->transaksiModel->getLaporanTransaksi($tgl_awal, $tgl_akhir, '1'); // Ambil data transaksi masuk sesuai filter
        } else {
            $data_order = $this->orderModel->getLaporan($tgl_awal, $tgl_akhir); // Ambil data transaksi keluar sesuai filter
            $data_transaksi = $this->transaksiModel->getLaporanTransaksi($tgl_awal, $tgl_akhir, '1'); // Ambil data transaksi masuk sesuai filter
        }
        
        // dd($data_order, $data_transaksi);

        // dd($data_all_pendapatan);    
        $data = [ // Data yang akan dikirim ke view
            'title' => 'Laporan Pendapatan',
            'title_laporan' => 'Laporan Pendapatan ' . $tgl_awal . ' s/d ' . $tgl_akhir,
            'main_menu' => 'Laporan',
            'menu_aktif' => 'laporan_pendapatan',
            'validation' => \Config\Services::validation(),
            'data_order' => $data_order,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
            'data_transaksi' => $data_transaksi,
            'data_order' => $data_order,
            'jenis_pendapatan' => $jenis_pendapatan,
        ];
        return view('Admin/Laporan/cetak_pendapatan', $data); // Load view
    }

    public function StokBarang(){
        // $detailStok = $this->detailStokTipeBarangModel->getAllStok(); // Ambil data stok barang 
        $data_tipe_barang = $this->tipeBarangModel->getTipeBarang(); // Ambil data tipe barang
        // dd($data_tipe_barang);
        $data = [ // Data yang akan dikirim ke view
            'title' => 'Laporan Stok Barang',
            'title_laporan' => 'Laporan Stok Barang',
            'main_menu' => 'Laporan',
            'menu_aktif' => 'laporan_stok_barang',
            'data_stok' => $data_tipe_barang,
            'validation' => \Config\Services::validation(),
        ];
        return view('Admin/Laporan/StokBarang', $data); // Load view
    }

    public function cetak_stok_barang(){
        // $detailStok = $this->detailStokTipeBarangModel->getAllStok(); // Ambil data stok barang 
        $data_tipe_barang = $this->tipeBarangModel->getTipeBarang(); // Ambil data tipe barang
        // dd($data_tipe_barang);
        $data = [ // Data yang akan dikirim ke view
            'title' => 'Laporan Stok Barang',
            'title_laporan' => 'Laporan Stok Barang',
            'main_menu' => 'Laporan',
            'menu_aktif' => 'laporan_stok_barang',
            'data_stok' => $data_tipe_barang,
            'validation' => \Config\Services::validation(),
        ];
        return view('Admin/Laporan/cetak_stok_barang', $data); // Load view
    }

}
?>