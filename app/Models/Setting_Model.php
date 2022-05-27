<?php

namespace App\Models;

use CodeIgniter\Model;

class Setting_Model extends Model
{
    protected $table = 'tb_setting';
    protected $primaryKey = 'name';
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['name', 'value'];
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getSet($name = false)
    {
        if ($name == false) {
            return $this->findall();
        }

        return $this->where(['name' => $name])->first();
    }

    //--------------------------------------------------------------------

}
