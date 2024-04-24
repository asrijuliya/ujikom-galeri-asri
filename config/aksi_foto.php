<?php
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $judul_foto = $_POST['judul_foto'];
    $deskripsi_foto = $_POST['deskripsi_foto'];
    $tanggal_unggah = date('Y-m-d');
    $album_id = $_POST['album_id'];
    $user_id = $_SESSION['user_id'];
    $foto = $_FILES['nama_file']['name'];
    $tmp = $_FILES['nama_file']['tmp_name'];
    $lokasi = '../asests/img';
    $nama_foto = rand().'-'.$foto;

    move_uploaded_file($tmp, $lokasi.$nama_foto);

    $sql = mysqli_query($koneksi, "INSERT INTO foto VALUES ('','$judul_foto','$deskripsi_foto','$tanggal_unggah','$album_id','$user_id')");

    echo "<script>
    alert('Data berhasil disimpan!');
    location.href='../admin/foto.php'; 
    </script>";
}

?>