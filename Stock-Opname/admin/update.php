<?php 
include 'config.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$jumlah = $_POST['jumlah'];
$jumlah_SMALL = $_POST['Jumlah_SMALL'];
$jumlah_MEDIUM = $_POST['Jumlah_MEDIUM'];
$jumlah_LARGE = $_POST['Jumlah_LARGE'];

$conn->query("UPDATE barang SET nama='$nama', jenis='$jenis', jumlah='$jumlah', jumlah_SMALL='$jumlah_SMALL', jumlah_MEDIUM='$jumlah_MEDIUM', jumlah_LARGE='$jumlah_LARGE' WHERE id='$id'");
header("location:barang.php?pesan=update");

?>