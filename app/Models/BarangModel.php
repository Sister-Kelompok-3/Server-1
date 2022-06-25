<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'tb_master_barang';
    protected $primaryKey = 'kode_barang';
    protected $allowedFields = ['kode_barang', 'nama_barang', 'satuan', 'stok'];
}
