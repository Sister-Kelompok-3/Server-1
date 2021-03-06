<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\BarangModel;
use PDO;

class Home extends BaseController
{
    // public function index()
    // {
    //     return view('pages/barang');
    // }
    private $host = "localhost";
    private $dbname = "dbs_server1";
    private $conn;

    // koneksi ke database mysql di server
    private $driver = "mysql";
    private $user = "root";
    private $password = "";
    private $port = "3306";





    // public function __construct()
    // {
    //     try {
    //         if ($this->driver == 'mysql') {
    //             $this->conn = new  PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname;charset=utf8", $this->user, $this->password);
    //         }
    //     } catch (PDOException $e) {
    //         echo "ANJING";
    //     }
    // }

    public function filter($data)
    {
        $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
        return $data;
        unset($data);
    }
    public function tambah_barang($kode_barang, $nama_barang, $satuan, $stok)
    {
        $kode_barang = $this->filter($kode_barang);
        $query = $this->conn->prepare("insert into tb_master_barang (kode_barang,nama_barang,satuan,stok) values (?,?,?,?)");
        $query->execute(array($kode_barang, $nama_barang, $satuan, $stok));
        $query->closeCursor();
        unset($kode_barang, $nama_barang, $satuan, $stok);
    }
}
