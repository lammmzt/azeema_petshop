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
}
?>