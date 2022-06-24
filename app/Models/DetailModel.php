<?php

namespace App\Models;

use CodeIgniter\Model;
// masih blm jadi
class DetailModel extends Model
{
    protected $table = 'tb_detail_masuk';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['kode_barang', 'jumlah'];
}
