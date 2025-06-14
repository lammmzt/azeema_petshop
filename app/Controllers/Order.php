<?php 

namespace App\Controllers;

use App\Models\orderModel;
use App\Models\detailOrderModel;
use App\Models\layananModel;
use App\Models\usersModel;
class Order extends BaseController
{
    protected $orderModel;
    protected $detailOrderModel;
    protected $layananModel;
    protected $usersModel;
    
    public function __construct()
    {
        $this->orderModel = new orderModel();
        $this->detailOrderModel = new detailOrderModel();
        $this->layananModel = new layananModel();
        $this->usersModel = new usersModel();
    }

    public function index()
    {
        $detailOrderModel = new detailOrderModel();
        $data = [
            'title' => 'Daftar Pemesanan',
            'main_menu' => 'Order',
            'menu_aktif' => 'Order',
            'validation' => \Config\Services::validation(),
            'order' => $this->orderModel->getOrder(),
            'detailOrderModel' => $detailOrderModel,
        ];

        return view('Admin/Order/index', $data);
    }

    public function tambah_orderan() // Menampilkan halaman tambah transaksi masuk
    {
        $data_user = $this->usersModel->where('role', '3')->findAll(); // Mengambil data user dengan level 'user'
        $data_layanan = $this->layananModel->getLayanan(); // Mengambil data layanan
        $data = [ // Data yang akan dikirim ke view
            'title' => 'Tambah Pemesanan',
            'main_menu' => 'Order',
            'menu_aktif' => 'Tambah Pemesanan',
            'validation' => \Config\Services::validation(),
            'data_user' => $data_user,
            'data_layanan' => $data_layanan,
        ];
        
        return view('Admin/Order/tambah', $data); // Load view
    }

    public function proses_order()
    {
        $orderModel = new orderModel();
        $id_order = $this->request->getPost('id_order');
        $status_order = $this->request->getPost('status_order');
        if($status_order == '2') {
            $data = [
                'status_order' => '2',
                'ket_proses' => $this->request->getPost('ket_proses'),
                'tanggal_disetujui' => date('Y-m-d H:i:s')
            ];
        } else if($status_order == '3') {
            $data = [
                'status_order' => '3',
                'ket_proses' => $this->request->getPost('ket_proses'),
                'tanggal_proses' => date('Y-m-d H:i:s')
            ];
        } else if($status_order == '4') {
            $data = [
                'status_order' => '4',
                'ket_proses' => $this->request->getPost('ket_proses'),
                'tanggal_selesai' => date('Y-m-d H:i:s')
            ];
        } else {
            $data = [
                'status_order' => '0',
                'ket_proses' => $this->request->getPost('ket_proses'),
                'tanggal_selesai' => date('Y-m-d H:i:s')
            ];
        }
        $orderModel->update($id_order, $data);
        session()->setFlashdata('success', 'Status Order Berhasil Diubah');
        return redirect()->to(base_url('Order'));
    }

    // ================================== PRINT STRUK ==================================
    public function print_struk($id_order) // Menampilkan halaman print struk 
    {
        $data = [ // Data yang akan dikirim ke view
            'title' => 'Print Struk Pemesanan',
            'order' => $this->orderModel->getOrder($id_order), // Mengambil data order berdasarkan id
            'detail_order' => $this->detailOrderModel->getDetailOrderByOrder($id_order), // Mengambil detail order berdasarkan id order
        ];
        // dd($data);

        return view('Admin/Order/print_struk', $data); // Load view

    }
}
?>