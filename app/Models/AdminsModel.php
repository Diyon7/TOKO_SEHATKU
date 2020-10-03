<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class AdminsModel extends Model
{
    protected $table        = 'admin';
    protected $primaryKey   = 'id_admin';
    protected $allowedFields = ['username', 'password', 'nama', 'foto', 'email'];
    protected $useTimestamps = false;
}

