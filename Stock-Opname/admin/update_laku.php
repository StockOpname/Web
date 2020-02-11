<?php 
include 'config.php';
$tanggal=$_POST['tanggal'];
$nama=$_POST['nama'];
$jumlah=$_POST['jumlah'];
$jumlah_SMALL=$_POST['jumlah_SMALL'];
$jumlah_MEDIUM=$_POST['jumlah_MEDIUM'];
$jumlah_LARGE=$_POST['jumlah_LARGE'];

mysql_query("UPDATE barang_laku SET tanggal='$tanggal', nama='$nama', jumlah='$jumlah', jumlah_MEDIUM='$jumlah_SMALL', jumlah_MEDIUM='$jumlah_MEDIUM', jumlah_LARGE='$jumlah_LARGE' WHERE id='$id'");
header("location:barang_laku.php?pesan=update");
?>