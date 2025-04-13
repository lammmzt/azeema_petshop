<?php 
namespace App\Models;

use CodeIgniter\Model;

class detailOrderModel extends Model
{
    protected $table = 'detail_order';
    protected $primaryKey = 'id_detail_order';
    protected $allowedFields = ['id_detail_order','id_order', 'id_layanan', 'jumlah_order', 'sub_total_order'];

    public function getDetailOrder($id_detail_order = false)
    {
        if ($id_detail_order == false) {
            return $this
            ->select('detail_order.*, layanan.nama_layanan, layanan.harga_layanan, order.tanggal_order, order.tanggal_proses, order.tanggal_datang, order.jam_datang, order.tipe_pembayaran, order.bukti_pembayaran, order.total_order, order.ket_order, order.status_order, users.nama_user, users.username, users.no_hp_user, users.alamat_user')
            ->join('layanan', 'layanan.id_layanan = detail_order.id_layanan')
            ->join('order', 'order.id_order = detail_order.id_order')
            ->join('users', 'users.id_user = order.id_user')
            ->orderBy('id_detail_order', 'DESC')
            ->findAll();
        }
        return $this
        ->select('detail_order.*, layanan.nama_layanan, layanan.harga_layanan, order.tanggal_order, order.tanggal_proses, order.tanggal_datang, order.jam_datang, order.tipe_pembayaran, order.bukti_pembayaran, order.total_order, order.ket_order, order.status_order, users.nama_user, users.username, users.no_hp_user, users.alamat_user')
        ->join('layanan', 'layanan.id_layanan = detail_order.id_layanan')
        ->join('order', 'order.id_order = detail_order.id_order')
        ->join('users', 'users.id_user = order.id_user')
        ->where(['id_detail_order' => $id_detail_order])->first();
    }   

    public function getDetailOrderByOrder($id_order)
    {
        return $this
        ->select('detail_order.*, layanan.nama_layanan, layanan.harga_layanan, order.tanggal_order, order.tanggal_proses, order.tanggal_datang, order.jam_datang, order.tipe_pembayaran, order.bukti_pembayaran, order.total_order, order.ket_order, order.status_order, users.nama_user, users.username, users.no_hp_user, users.alamat_user')
        ->join('layanan', 'layanan.id_layanan = detail_order.id_layanan')
        ->join('order', 'order.id_order = detail_order.id_order')
        ->join('users', 'users.id_user = order.id_user')
        ->where(['detail_order.id_order' => $id_order])
        ->orderBy('id_detail_order', 'DESC')
        ->findAll();
    }
}
?>