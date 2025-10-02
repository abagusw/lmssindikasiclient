<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterGenderModel extends Model
{
    protected $table = 'ms_gender';
    protected $allowedFields = ['name'];
    protected $useTimestamps = false;
    protected $order = ['id' => 'DESC'];


    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect(); // hanya dipanggil satu kali
    }
}

