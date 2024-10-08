<?php 
namespace App\Models;

use CodeIgniter\Model;

class usersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['id_user','username', 'password', 'role', 'nama_user', 'alamat_user', 'no_hp_user'];

    public function getUsers($id_user = false)
    {
        if ($id_user == false) {
            return $this->findAll();
        }
        return $this->where(['id_user' => $id_user])->first();
    }   
}
?>