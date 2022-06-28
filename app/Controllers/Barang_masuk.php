<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\TransaksiModel;

class Barang_masuk extends ResourceController
{
    // use ResponseTrait;
    // private $host = "localhost";
    // private $dbname = "dbs_server1";
    // private $conn;

    // // koneksi ke database mysql di server
    // private $driver = "mysql";
    // private $user = "root";
    // private $password = "";
    // private $port = "3306";


    // all users
    public function index()
    {
        $model = new TransaksiModel();
        $data['barang_masuk'] = $model->orderBy('id_transaksi', 'DESC')->findAll();
        return $this->respond($data);
    }
    // create
    public function create()
    {
        $model = new TransaksiModel();
        $data = [
            'id_transaksi' => $this->request->getVar('id_transaksi'),
            'tanggal' => $this->request->getVar('tanggal'),
            'lokasi'  => $this->request->getVar('lokasi'),
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data produk berhasil ditambahkan.'
            ]
        ];
        return $this->respondCreated($response);
    }
    // single user
    public function show($id_transaksi = null)
    {
        $model = new TransaksiModel();
        $data = $model->where('id_transaksi', $id_transaksi)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
    // update
    public function update($id_transaksi = null)
    {
        $model = new TransaksiModel();
        $id_transaksi = $this->request->getVar('id_transaksi');
        $data = [
            'id_transaksi' => $this->request->getVar('id_transaksi'),
            'tanggal' => $this->request->getVar('tanggal'),
            'lokasi'  => $this->request->getVar('lokasi'),
        ];
        $model->update($id_transaksi, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data produk berhasil diubah.'
            ]
        ];
        return $this->respond($response);
    }
    // delete
    public function delete($id_transaksi = null)
    {
        $model = new TransaksiModel();
        $data = $model->where('id_transaksi', $id_transaksi)->delete($id_transaksi);
        if ($data) {
            $model->delete($id_transaksi);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data produk berhasil dihapus.'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
}
