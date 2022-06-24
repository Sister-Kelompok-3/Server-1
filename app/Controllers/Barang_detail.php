<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\DetailModel;
use CodeIgniter\HTTP\Request;

class Barang_detail extends ResourceController
{
    use ResponseTrait;
    // all users
    public function index()
    {
        $model = new DetailModel();
        $data['id_transaksi'] = $model->orderBy('id_transaksi', 'DESC')->findAll();
        return $this->respond($data);
    }
    // create
    public function create()
    {
        $model = new DetailModel();
        $data = [
            'id_transaksi' => $this->request->getVar('id_transaksi'),
            'kode_barang' => $this->request->getVar('kode_barang'),
            'jumlah'  => $this->request->getVar('jumlah'),
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
        $model = new DetailModel();
        $data = $model->where('id_transaksi', $id_transaksi)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
    // update
    public function update($id_transaksig = null)
    {
        $model = new DetailModel();
        $id_transaksi = $this->request->getVar('id_transaksi');
        $data = [
            'id_transaksi' => $this->request->getVar('id_transaksi'),
            'kode_barang' => $this->request->getVar('kode_barang'),
            'jumlah'  => $this->request->getVar('jumlah'),
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
        $model = new DetailModel();
        $data = $model->where('kode_barang', $id_transaksi)->delete($id_transaksi);
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
