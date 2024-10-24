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
            return $this->findAll();
        } else {
            return $this->getWhere(['id_transaksi' => $id]);
        }   
    }

    public function getTransaksiByJenis($jenis)
    {
        return $this
            ->where(['jenis_transaksi' => $jenis])
            ->findAll();
    }
}


?>