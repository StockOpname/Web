<?php 
include 'config.php';
$id=$_POST['id'];
$nama=$_POST['nama'];
$jenis=$_POST['jenis'];
// $suplier=$_POST['suplier'];
// $modal=$_POST['modal'];
// $harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];
$satuan=$_POST['satuan'];

mysql_query("update barang set nama='$nama', jenis='$jenis', jumlah='$jumlah', satuan='$satuan' where id='$id'");
header("location:barang.php");

?>