<?php
namespace App\Models;

use CodeIgniter\Model;

class PendidikanModel extends Model
{
    protected $table      = 'tb_pendidikan';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'user_id','institution','major',
        'start_month','start_year','end_month','end_year',
        'is_current'
    ];
}