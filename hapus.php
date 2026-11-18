<?php
include_once 'koneksi.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id > 0) {
    $query_gambar = mysqli_query($conn, "SELECT gambar FROM data_barang WHERE id_barang = '{$id}'");
    if ($query_gambar && $data = mysqli_fetch_assoc($query_gambar)) {
        if (!empty($data['gambar']) && file_exists($data['gambar'])) {
            unlink($data['gambar']);
        }
    }

    $sql = "DELETE FROM data_barang WHERE id_barang = '{$id}'";
    mysqli_query($conn, $sql);
}

header('location: index.php');
exit;
