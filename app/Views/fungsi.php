<?php

session_start();

// membuat koneksi ke database 
$conn = mysqli_connect("localhost", "root", "", "db_master_barang");

// menambah barang baru 
if (isset($_POST['tambahbarang'])) {
    $namabarang = $_POST['namabarang'];
    $satuan = $_POST['satuan'];
    $stock = $_POST['stock'];

    $addtotable = mysqli_query($conn, "insert into tb_master_barang(nama_barang, satuan, stock) values ('$namabarang','$satuan','$stock')");
    if ($tambahketabel) {
        header('location:BarangDalamGudang.php');
    } else {
        echo 'gagal';
        header('location:BarangDalamGudang.php');
    }
};

// menambahkan barang masuk
if (isset($_POST['barangmasuk'])) {
    $barangnya = $_POST['nama_barang'];
    $tanggal = $_POST['tanggal'];
    $penerima = $_POST['penerima'];
    $lokasi = $_POST['lokasi'];
    $qty = $_POST['qty'];

    $addtotable = mysqli_query($conn, "insert into tb_barang_masuk (nama_barang,tanggal, penerima, lokasi, qty) values ('$nama_barang','$tanggal','$penerima','$lokasi','$qty')");
    if ($addtomasuk) {
        header('location:BarangDalamGudang.php');
    } else {
        echo 'gagal';
        header('location:BarangDalamGudang.php');
    }
}
