<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function insert_barang()
    {
        return view('pages/insert_barang');
    }
    public function view_barang()
    {
        return view('pages/barang');
    }
}
