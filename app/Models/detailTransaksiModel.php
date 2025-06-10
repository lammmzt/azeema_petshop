<?php 
namespace App\Models;

use CodeIgniter\Model;

class detailTransaksiModel extends Model
{
    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id_detail_transaksi';
    protected $allowedFields = ['id_transaksi', 'id_tipe_barang', 'jumlah_transaksi', 'sub_total_transaksi','harga_barang','exp_barang'];

    public function getDetailTransaksi($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id_detail_transaksi' => $id]);
        }   
    }

    public function getDetailTransaksiByTransaksi($id_transaksi)
    {
        return $this
            ->select('detail_transaksi.*, tipe_barang.id_barang, barang.nama_barang, tipe_barang.merk_tipe_barang, tipe_barang.satuan')
            ->join('tipe_barang', 'tipe_barang.id_tipe_barang = detail_transaksi.id_tipe_barang')
            ->join('barang', 'barang.id_barang = tipe_barang.id_barang')
            ->join('transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi')
            ->where('detail_transaksi.id_transaksi', $id_transaksi)
            ->findAll();
    }
}
?>