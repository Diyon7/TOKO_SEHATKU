<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class ProductModel extends Model
{
    protected $table        = 'barang';
    protected $primaryKey   = 'id_barang';
    protected $allowedFields = ['id_barang', 'nama', 'id_kategori', 'untuk_orang', 'deskripsi', 'link', 'tanggal_masuk', 'harga_jual', 'foto'];
    protected $useTimestamps = false;
}
