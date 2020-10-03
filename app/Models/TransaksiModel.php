<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class TransaksiModel extends Model
{
    protected $table        = 'transaksi';
    protected $primaryKey   = 'id';
    protected $allowedFields = ['id_barang', 'id_pembeli', 'jumlah', 'total_harga', 'ongkir', 'status', 'tujuan'];
    protected $useTimestamps = false;
}
