<?php

namespace App\Models;

use CodeIgniter\Model;
// masih blm jadi
class DetailModel extends Model
{
    protected $table = 'tb_detail_masuk';
    protected $allowedFields = ['id_transaksi', 'kode_barang', 'jumlah'];
}
