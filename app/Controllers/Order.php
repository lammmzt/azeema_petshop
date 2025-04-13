<?php 


use App\Models\orderModel;

class Order extends BaseController
{
    protected $orderModel;
    public function __construct()
    {
        $this->orderModel = new orderModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Order',
            'main_menu' => 'Order',
            'menu_aktif' => 'Order',
            'validation' => \Config\Services::validation(),
            'order' => $this->orderModel->getOrder()
        ];

        return view('Admin/Order/index', $data);
    }
}
?>