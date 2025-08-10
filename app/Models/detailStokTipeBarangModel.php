<?php 
namespace App\Models;

use CodeIgniter\Model;

class detailStokTipeBarangModel  extends Model
{
    protected $table = 'detail_stok_tipe_barang';
    protected $primaryKey = 'id_detail_stok_tipe_barang';
    protected $allowedFields = ['id_detail_stok_tipe_barang','id_tipe_barang', 'harga_beli_detail_stok_tipe_barang', 'harga_detail_stok_tipe_barang', 'jumlah_detail_stok_tipe_barang', 'created_at', 'updated_at', 'exp_detail_stok_tipe_barang'];

    public function getStokTipeBarang($id_detail_stok_tipe_barang = false)
    {
        if ($id_detail_stok_tipe_barang == false) {
            return $this
                    ->select('detail_stok_tipe_barang.*, barang.nama_barang, tipe_barang.merk_tipe_barang, tipe_barang.satuan')
                    ->join('tipe_barang', 'tipe_barang.id_tipe_barang = detail_stok_tipe_barang.id_tipe_barang')
                    ->join('barang', 'barang.id_barang = tipe_barang.id_barang')
                    ->orderBy('detail_stok_tipe_barang.exp_detail_stok_tipe_barang', 'ASC')
                    ->orderBy('tipe_barang.merk_tipe_barang', 'ASC')
                    ->orderBy('barang.nama_barang', 'ASC')
                    ->findAll();
        }
        return $this
                    ->select('detail_stok_tipe_barang.*, barang.nama_barang, tipe_barang.merk_tipe_barang, tipe_barang.satuan')
                    ->join('tipe_barang', 'tipe_barang.id_tipe_barang = detail_stok_tipe_barang.id_tipe_barang')
                    ->join('barang', 'barang.id_barang = tipe_barang.id_barang')
                    ->where(['detail_stok_tipe_barang.id_detail_stok_tipe_barang' => $id_detail_stok_tipe_barang])
                    ->first();
    }   

    public function getStokTipeBarangActive()
    {
        return $this->select('detail_stok_tipe_barang.*, barang.nama_barang, tipe_barang.merk_tipe_barang, tipe_barang.satuan')
                    ->join('tipe_barang', 'tipe_barang.id_tipe_barang = detail_stok_tipe_barang.id_tipe_barang')
                    ->join('barang', 'barang.id_barang = tipe_barang.id_barang')
                    ->where(['detail_stok_tipe_barang.jumlah_detail_stok_tipe_barang >' => 0])
                    ->where(['detail_stok_tipe_barang.exp_detail_stok_tipe_barang >' => date('Y-m-d')])
                    ->orderBy('detail_stok_tipe_barang.exp_detail_stok_tipe_barang', 'ASC')
                    ->orderBy('tipe_barang.merk_tipe_barang', 'ASC')
                    ->orderBy('barang.nama_barang', 'ASC')
                    ->findAll();
    }

    public function getStokTipeBarangByIdBarang($id_barang)
    {
        return $this->select('barang.nama_barang,barang.id_barang, tipe_barang.harga_tipe_barang, tipe_barang.id_tipe_barang, tipe_barang.merk_tipe_barang, tipe_barang.satuan, SUM(detail_stok_tipe_barang.jumlah_detail_stok_tipe_barang) as total_stok')
                    ->join('tipe_barang', 'tipe_barang.id_tipe_barang = detail_stok_tipe_barang.id_tipe_barang')
                    ->join('barang', 'barang.id_barang = tipe_barang.id_barang')
                    ->where(['tipe_barang.id_barang' => $id_barang])
                    ->groupBy('detail_stok_tipe_barang.id_tipe_barang')
                    ->findAll();
    }

    public function getStokTipeBarangByIdTipeBarang($id_tipe_barang)
    {
        return $this
                    ->select('detail_stok_tipe_barang.*, barang.nama_barang, tipe_barang.merk_tipe_barang, tipe_barang.satuan')
                    ->join('tipe_barang', 'tipe_barang.id_tipe_barang = detail_stok_tipe_barang.id_tipe_barang')
                    ->join('barang', 'barang.id_barang = tipe_barang.id_barang')
                    ->where(['detail_stok_tipe_barang.id_tipe_barang' => $id_tipe_barang])
                    ->where(['detail_stok_tipe_barang.jumlah_detail_stok_tipe_barang >' => 0])
                    ->orderBy('detail_stok_tipe_barang.exp_detail_stok_tipe_barang', 'ASC')
                    ->orderBy('tipe_barang.merk_tipe_barang', 'ASC')
                    ->orderBy('barang.nama_barang', 'ASC')
                    ->findAll();
    }
    
    public function getStokMinimal()
    {
        return $this->select('barang.nama_barang, barang.id_barang, tipe_barang.id_tipe_barang, tipe_barang.merk_tipe_barang, tipe_barang.satuan, SUM(detail_stok_tipe_barang.jumlah_detail_stok_tipe_barang) as total_stok')
                    ->join('tipe_barang', 'tipe_barang.id_tipe_barang = detail_stok_tipe_barang.id_tipe_barang')
                    ->join('barang', 'barang.id_barang = tipe_barang.id_barang')
                    ->groupBy('detail_stok_tipe_barang.id_tipe_barang')
                    ->having('SUM(detail_stok_tipe_barang.jumlah_detail_stok_tipe_barang) < 5') // Ganti 5 dengan stok minimal yang diinginkan
                    ->orderBy('SUM(detail_stok_tipe_barang.jumlah_detail_stok_tipe_barang)', 'ASC')
                    ->findAll();
    }

    public function getAllStok()
    {
        return $this->select('barang.nama_barang,barang.id_barang, tipe_barang.id_tipe_barang, tipe_barang.merk_tipe_barang, tipe_barang.satuan, SUM(detail_stok_tipe_barang.jumlah_detail_stok_tipe_barang) as total_stok')
                    ->join('tipe_barang', 'tipe_barang.id_tipe_barang = detail_stok_tipe_barang.id_tipe_barang')
                    ->join('barang', 'barang.id_barang = tipe_barang.id_barang')
                    ->groupBy('tipe_barang.id_tipe_barang')
                    ->findAll();
    }
    
    public function getStokRilllByIdTipeBarang($id_tipe_barang)
    {
        return $this
                    ->select('barang.nama_barang,barang.id_barang, tipe_barang.merk_tipe_barang, tipe_barang.satuan, SUM(detail_stok_tipe_barang.jumlah_detail_stok_tipe_barang) as total_stok')
                    ->join('tipe_barang', 'tipe_barang.id_tipe_barang = detail_stok_tipe_barang.id_tipe_barang')
                    ->join('barang', 'barang.id_barang = tipe_barang.id_barang')
                    ->where(['tipe_barang.id_tipe_barang' => $id_tipe_barang])
                    ->groupBy('detail_stok_tipe_barang.id_tipe_barang')
                    ->findAll();
    }

    public function getProductBecomeExpired()
    {
    return $this->select('detail_stok_tipe_barang.*, barang.nama_barang, barang.id_barang, tipe_barang.merk_tipe_barang, tipe_barang.satuan')
                ->join('tipe_barang', 'tipe_barang.id_tipe_barang = detail_stok_tipe_barang.id_tipe_barang')
                ->join('barang', 'barang.id_barang = tipe_barang.id_barang')
                ->where('detail_stok_tipe_barang.jumlah_detail_stok_tipe_barang >', 0)
                ->groupStart()
                    ->where('detail_stok_tipe_barang.exp_detail_stok_tipe_barang <', date('Y-m-d', strtotime('+30 days')))
                    ->orWhere('detail_stok_tipe_barang.exp_detail_stok_tipe_barang <', date('Y-m-d'))
                ->groupEnd()
                ->orderBy('detail_stok_tipe_barang.exp_detail_stok_tipe_barang', 'ASC')
                ->findAll();
}
}

?>