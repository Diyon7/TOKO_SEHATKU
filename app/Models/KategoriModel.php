<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class KategoriModel extends Model
{
    protected $table        = 'kategori';
    protected $primaryKey   = 'id_kategori';
    protected $allowedFields = ['nama_kategori'];
    protected $useTimestamps = false;
}

