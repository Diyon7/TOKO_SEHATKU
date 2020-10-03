<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class EmailModel extends Model
{
    protected $table        = 'email';
    protected $primaryKey   = 'id';
    protected $allowedFields = ['subject', 'content'];
    protected $useTimestamps = false;
}

