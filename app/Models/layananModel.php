<?php 
namespace App\Models;

use CodeIgniter\Model;

class layananModel extends Model
{
    protected $table = 'layanan';
    protected $primaryKey = 'id_layanan';
    protected $allowedFields = ['id_layanan','nama_layanan', 'harga_layanan', 'deskripsi_layanan', 'promo_layanan', 'foto_layanan'];

    public function getLayanan($id_layanan = false)
    {
        if ($id_layanan == false) {
            return $this->findAll();
        }
        return $this->where(['id_layanan' => $id_layanan])->first();
    }   
}


?>