<?php 
namespace App\Models;

use CodeIgniter\Model;

class barangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $allowedFields = ['id_barang','nama_barang', ];

    public function getBarang($id_barang = false)
    {
        if ($id_barang == false) {
            return $this->findAll();
        }
        return $this->where(['id_barang' => $id_barang])->first();
    }   
}

?>