<?php

namespace App\Controllers;

use App\Models\loginModel;

class Barang extends BaseController
{

    public function index()
    {
        $model = new loginModel();
        $data['login'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }
    // create
    public function login()
    {
        $Model = new loginModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = $Model->where('username', $username)->first();

        if (empty($user)) {
            session()->setFlashdata('message', 'Username atau Password Salah');
            return redirect()->to('/login');
        }
        if ($user['password'] != $password) {
            session()->setFlashdata('message', 'Username atau Password Salah');
            return redirect()->to('/login');
        }
        session()->set('username', $username);
        return redirect()->to('/');
    }
    public function logout()
    {
        session()->remove('username');
        return redirect()->to('/login');
    }
}
