<?php

namespace App\Controllers;
use App\Models\transaksiModel;
use App\Models\detailTransaksiModel;
use App\Models\barangModel;
use App\Models\tipeBarangModel;
use App\Models\orderModel;
use App\Models\detailOrderModel;
use App\Models\layananModel;
use App\Models\usersModel;
use App\Models\detailStokTipeBarangModel;


class Home extends BaseController
{
    public function index(): string
    {
        $transaksiModel = new transaksiModel();
        $detailTransaksiModel = new detailTransaksiModel();
        $barangModel = new barangModel();
        $tipeBarangModel = new tipeBarangModel();
        $orderModel = new orderModel(); 
        $detailOrderModel = new detailOrderModel();
        $layananModel = new layananModel();
        $usersModel = new usersModel();
        $detailStokTipeBarangModel = new detailStokTipeBarangModel();

        $jml_user = $usersModel->countAllResults();
        $jml_order = $orderModel->countAllResults();
        $jml_layanan = $layananModel->countAllResults();
        $jml_transaksi = $transaksiModel->countAllResults();
        
        if($this->request->getPost('tahun_grafik_transaksi')){
            $tahun_grafik_transaksi = $this->request->getPost('tahun_grafik_transaksi');
        }
        else{
            $tahun_grafik_transaksi = date('Y');
        }
        
        $data_grafik= [];
        for($i=1; $i<=12; $i++){
            $jml_transaksi_tahunan = $transaksiModel->getTransaksiKeluarByYearMonth($tahun_grafik_transaksi, $i);
            $jml_order_tahunan = $orderModel->getOrderByYearMonth($tahun_grafik_transaksi, $i);
            $data_grafik[$i] = [
                'bulan' => $i,
                'jml_transaksi' => $jml_transaksi_tahunan[0]['jml_transaksi'] ?? 0,
                'jml_order' => $jml_order_tahunan[0]['jml_order'] ?? 0,
            ];
        }
        // dd($data_grafik);
        $data_become_expired = $detailStokTipeBarangModel->getProductBecomeExpired();
        // dd($data_become_expired);
        $dataStokMinimal = $detailStokTipeBarangModel->getStokMinimal();
        // dd($dataStokMinimal);
        $data = [
            'title' => 'Dashboard',
            'menu_aktif' => 'Dashboard',
            'main_menu' => '',
            'jml_user' => $jml_user,
            'jml_order' => $jml_order,
            'jml_layanan' => $jml_layanan,
            'jml_transaksi' => $jml_transaksi,
            'data_become_expired' => $data_become_expired,
            'tahun_grafik_transaksi' => $tahun_grafik_transaksi,
            'data_grafik' => $data_grafik,
            'data_stok_minimal' => $dataStokMinimal,
        ];
        return view('Admin/Dashboard/index', $data);
    }
}