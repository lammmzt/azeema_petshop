<?php 

namespace App\Controllers;

use App\Models\orderModel;
use App\Models\detailOrderModel;
class Order extends BaseController
{
    protected $orderModel;
    
    public function __construct()
    {
        $this->orderModel = new orderModel();
    }

    public function index()
    {
        $detailOrderModel = new detailOrderModel();
        $data = [
            'title' => 'Daftar Order',
            'main_menu' => 'Order',
            'menu_aktif' => 'Order',
            'validation' => \Config\Services::validation(),
            'order' => $this->orderModel->getOrder(),
            'detailOrderModel' => $detailOrderModel,
        ];

        return view('Admin/Order/index', $data);
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