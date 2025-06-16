<?php 
namespace App\Models;

use CodeIgniter\Model;

class tipeBarangModel extends Model
{
    protected $table = 'tipe_barang';
    protected $primaryKey = 'id_tipe_barang';
    protected $allowedFields = ['id_tipe_barang','id_barang', 'merk_tipe_barang', 'harga_tipe_barang', 'stok_tipe_barang', 'satuan'];

    public function getTipeBarang($id_tipe_barang = false)
    {
        if ($id_tipe_barang == false) {
            return $this->select('tipe_barang.*, barang.nama_barang')
                        ->join('barang', 'barang.id_barang = tipe_barang.id_barang')
                        ->findAll();
        }
        return $this->select('tipe_barang.*, barang.nama_barang')
                    ->join('barang', 'barang.id_barang = tipe_barang.id_barang')
                    ->where(['id_tipe_barang' => $id_tipe_barang])
                    ->first();
    }   

    public function getTipeBarangByBarang($id_barang)
    {
        return $this->select('tipe_barang.*, barang.nama_barang')
                    ->join('barang', 'barang.id_barang = tipe_barang.id_barang')
                    ->where(['tipe_barang.id_barang' => $id_barang])
                    ->findAll();
    }

    public function getStokMinimal()
    {
        return $this->select('tipe_barang.*, barang.nama_barang')
                    ->join('barang', 'barang.id_barang = tipe_barang.id_barang')
                    ->where('stok_tipe_barang <=', 5)
                    ->findAll();
    }
}

?>