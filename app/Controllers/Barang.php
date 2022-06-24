<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\BarangModel;

class Barang extends ResourceController
{
    use ResponseTrait;
    // all users
    public function index()
    {
        $model = new BarangModel();
        $data['barang'] = $model->orderBy('kode_barang', 'DESC')->findAll();
        return $this->respond($data);
    }
    // create
    public function create_barang()
    {
        $model = new BarangModel();
        $data = [
            'nama_barang' => $this->request->getVar('nama_barang'),
            'satuan'  => $this->request->getVar('satuan'),
            'stok'  => $this->request->getVar('stok'),
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
    public function show_barang($kode_barang = null)
    {
        $model = new BarangModel();
        $data = $model->where('kode_barang', $kode_barang)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
    // update
    public function update_barang($kode_barang = null)
    {
        $model = new BarangModel();
        $kode_barang = $this->request->getVar('kode_barang');
        $data = [
            'nama_barang' => $this->request->getVar('nama_barang'),
            'satuan'  => $this->request->getVar('satuan'),
            'stok'  => $this->request->getVar('stok'),
        ];
        $model->update($kode_barang, $data);
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
    public function delete_barang($kode_barang = null)
    {
        $model = new BarangModel();
        $data = $model->where('kode_barang', $kode_barang)->delete($kode_barang);
        if ($data) {
            $model->delete($kode_barang);
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
