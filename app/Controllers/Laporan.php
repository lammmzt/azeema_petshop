<?php 
namespace App\Controllers;

use App\Models\transaksiModel;
use App\Models\detailTransaksiModel;
use App\Models\orderModel;
use App\Models\detailOrderModel;
use App\Models\barangModel;
use App\Models\tipeBarangModel;
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
        // dd($data_transaksi);
        $data = [ // Data yang akan dikirim ke view
            'title' => 'Laporan Transaksi',
            'title_laporan' => 'Laporan Transaksi ' . $jenis_transaksi . ' ' . $tgl_awal . ' s/d ' . $tgl_akhir,
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

}
?>