<?php 
namespace App\Models;

use CodeIgniter\Model;

class transaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['id_transaksi', 'ket_transaksi', 'jenis_transaksi', 'tanggal_transaksi', 'total_transaksi', 'status_transaksi'];

    public function getTransaksi($id = false)
    {
        if($id === false){
            return $this
            ->orderBy('tanggal_transaksi', 'DESC')
            ->findAll();
        } else {
            return $this
            ->where(['id_transaksi' => $id])
            ->first();
        }   
    }

    public function getTransaksiByJenis($jenis)
    {
        return $this
            ->where(['jenis_transaksi' => $jenis])
            ->orderBy('tanggal_transaksi', 'DESC')
            ->findAll();
    }
}


?>