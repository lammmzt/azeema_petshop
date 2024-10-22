<?php 
namespace App\Controllers;

use App\Models\transaksiModel;
use App\Models\detailTransaksiModel;
use Ramsey\Uuid\Uuid;

class Transaksi extends BaseController
{
    protected $transaksiModel;
    protected $detailTransaksiModel;

    public function __construct()
    {
        $this->transaksiModel = new transaksiModel();
        $this->detailTransaksiModel = new detailTransaksiModel();
    }

    public function Masuk()
    {
        $data = [
            'title' => 'Daftar Transaksi Masuk',
            'main_menu' => 'Transaksi',
            'menu_aktif' => 'trasaksi_masuk',
            'validation' => \Config\Services::validation(),
            'transaksi' => $this->transaksiModel->getTransaksiByJenis('0'),
        ];
        return view('Transaksi/Masuk/index', $data);
    }
}
?>