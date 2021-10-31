<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mhs';
    protected $useTimestamps = true;
    protected $allowedFields = ['nim','nama','kelas','alamat'];


    public function getMahasiswa($id = false)
    {
        if ($id == false){

            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

}