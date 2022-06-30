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
    public function create()
    {
        $model = new BarangModel();
        $data = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'satuan'  => $this->request->getPost('satuan'),
            'stok'  => $this->request->getPost('stok'),
        ];
        $data = json_decode(file_get_contents("php://input"));
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data produk berhasil ditambahkan.'
            ]
        ];
        return $this->respondCreated($data, 201);
    }

    public function update($kode_barang = null)
    {
        $model = new BarangModel();
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'nama_barang' => $json->nama_barang,
                'stok' => $json->stok,
                'satuan' => $json->satuan
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'nama_barang' => $input['nama_barang'],
                'stok' => $input['stok'],
                'satuan' => $input['satuan']
            ];
        }

        $model->update($kode_barang, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];
        return $this->respond($response);
    }
    // delete
    public function delete($kode_barang = null)
    {

        $model = new BarangModel();
        $data = $model->find($kode_barang);
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
            return $this->failNotFound('Data tidak ditemukan.' . $kode_barang);
        }
    }
}
