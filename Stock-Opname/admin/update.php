<?php
include 'config.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
// $suplier=$_POST['suplier'];
// $modal=$_POST['modal'];
// $harga=$_POST['harga'];
$jumlah = $_POST['jumlah'];
$jumlah_SMALL = $_POST['Jumlah_SMALL'];
$jumlah_MEDIUM = $_POST['Jumlah_MEDIUM'];
$jumlah_LARGE = $_POST['Jumlah_LARGE'];

$conn->query("UPDATE barang set nama='$nama', jenis='$jenis', jumlah='$jumlah', Jumlah_SMALL='$jumlah_SMALL', Jumlah_MEDIUM='$jumlah_MEDIUM', Jumlah_LARGE='$jumlah_LARGE' where id='$id'");
header("location:barang.php");
