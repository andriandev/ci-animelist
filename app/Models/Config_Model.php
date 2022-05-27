<?php

namespace App\Models;

use CodeIgniter\Model;

class Config_Model extends Model
{
    protected $table = 'tb_config';
    protected $primaryKey = 'name';
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['name', 'value'];
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getConfig($name)
    {
        return $this->where(['name' => $name])->first();
    }

    //--------------------------------------------------------------------

}
