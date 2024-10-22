<?php 
namespace App\Models;

use CodeIgniter\Model;

class detailTransaksiModel extends Model
{
    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id_detail_transaksi';
    protected $allowedFields = ['id_detail_transaksi', 'id_transaksi', 'id_tipe_barang', 'jumlah_transaksi', 'sub_total_transaksi'];

    public function getDetailTransaksi($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id_detail_transaksi' => $id]);
        }   
    }
}
?>