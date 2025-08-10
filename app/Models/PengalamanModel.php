<?php
namespace App\Models;

use CodeIgniter\Model;

class PengalamanModel extends Model
{
    protected $table      = 'tb_pengalaman';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'user_id','role','company','industry',
        'start_month','start_year','end_month','end_year',
        'is_current','description'
    ];
}

?>