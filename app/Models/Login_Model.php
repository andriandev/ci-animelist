<?php

namespace App\Models;

use CodeIgniter\Model;

class Login_Model extends Model
{
    // Variabel untuk DB yang akan digunakan
    protected $table = 'tb_user';
    protected $primaryKey = 'id';
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [''];
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getUser($username = false)
    {
        if ($username == false) {
            return $this->findAll();
        }

        // Mengambil data dari DB berdasarkan username
        return $this->where(['username' => $username])->first();
    }

    //--------------------------------------------------------------------

}
