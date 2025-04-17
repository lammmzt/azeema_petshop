<?php 
namespace App\Models;

use CodeIgniter\Model;

class orderModel extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'id_order';
    protected $allowedFields = ['id_order','id_user', 'tanggal_order', 'tanggal_proses', 'tanggal_datang','tanggal_disetujui','tanggal_selesai', 'jam_datang','tipe_pembayaran', 'bukti_pembayaran', 'total_order', 'ket_order', 'status_order','ket_proses' ];

    public function getOrder($id_order = false)
    {
        if ($id_order == false) {
            return $this
            ->select('order.*, users.nama_user, users.username, users.no_hp_user, users.alamat_user')
            ->join('users', 'users.id_user = order.id_user')
            ->orderBy('id_order', 'DESC')
            ->findAll();
        }
        return $this
        ->where(['id_order' => $id_order])->first();
    }

    public function getOrderByUser($id_user)
    {
        return $this
        ->select('order.*, users.nama_user, users.username, users.no_hp_user, users.alamat_user')
        ->join('users', 'users.id_user = order.id_user')
        ->where(['order.id_user' => $id_user])
        ->orderBy('order.id_order', 'DESC')
        ->findAll();
    }
}


?>