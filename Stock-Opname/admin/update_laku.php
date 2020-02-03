<?php 
include 'config.php';
$tanggal=$_POST['tanggal'];
$nama=$_POST['nama'];
$jumlah=$_POST['jumlah'];
$satuan=$_POST['satuan'];

mysql_query("update barang_laku set tanggal='$tanggal', nama='$nama', jumlah='$jumlah', satuan='$satuan' where id='$id'");
header("location:barang_laku.php");

?>