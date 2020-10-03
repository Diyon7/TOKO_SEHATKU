<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class AkunModel extends Model
{
    protected $table        = 'akun';
    protected $primaryKey   = 'id_akun';
    protected $allowedFields = ['username', 'gender', 'tgll', 'password', 'alamat', 'kota', 'email', 'telepon'];
    protected $useTimestamps = false;
}
