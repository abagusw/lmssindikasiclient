<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tb_member';
    protected $allowedFields = ['password','token','token_expired'];
    protected $useTimestamps = true;

    public function getUserByEmail($email = false)
    {
        if ($email == false) {
            return $this->orderBy('role', 'ASC')->findAll();
        }

        return $this->where('email', $email)->first();
    }

    public function findWithCity($id)
    {
        return $this->select('tb_member.*, mc.kode as city_kode')
                    ->join('ms_city mc', 'mc.id = tb_member.domisili', 'left')
                    ->where('tb_member.id', $id)
                    ->first();
    }
}
