<?php

namespace App\Models;

use CodeIgniter\Model;
// masih blm jadi
class TransaksiModel extends Model
{
    protected $table = 'tb_barang_masuk';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['tanggal', 'lokasi'];
}
