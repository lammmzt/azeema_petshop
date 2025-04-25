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
            'title' => 'Daftar Orderan',
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
            'title' => 'Tambah Orderan',
            'main_menu' => 'Order',
            'menu_aktif' => 'Tambah Orderan',
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
                'tanggal_disetujui' => date('Y-m-d H:i:s')
            ];
        } else if($status_order == '3') {
            $data = [
                'status_order' => '3',
                'tanggal_proses' => date('Y-m-d H:i:s')
            ];
        } else if($status_order == '4') {
            $data = [
                'status_order' => '4',
                'tanggal_selesai' => date('Y-m-d H:i:s')
            ];
        } else {
            $data = [
                'status_order' => '0',
                'tanggal_selesai' => date('Y-m-d H:i:s')
            ];
        }
        $orderModel->update($id_order, $data);
        session()->setFlashdata('success', 'Status Order Berhasil Diubah');
        return redirect()->to(base_url('Order'));
    }
}
?>