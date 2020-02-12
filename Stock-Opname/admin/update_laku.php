<?php 
include 'config.php';
$tanggal=$_POST['tanggal'];
$tanggal=date('Y-m-d', strtotime($tanggal));
$nama=$_POST['nama'];
$jumlah=$_POST['jumlah'];
$jumlah_SMALL=$_POST['jumlah_SMALL'];
$jumlah_MEDIUM=$_POST['jumlah_MEDIUM'];
$jumlah_LARGE=$_POST['jumlah_LARGE'];

mysql_query("UPDATE barang_laku SET tanggal='$tanggal', nama='$nama', jumlah='$jumlah', jumlah_SMALL='$jumlah_SMALL', jumlah_MEDIUM='$jumlah_MEDIUM', jumlah_LARGE='$jumlah_LARGE' WHERE id='$id'");
header("location:barang_laku.php?pesan=update");

// UPDATE barang_laku SET tanggal='2020-02-12', nama='magnum', jumlah='123', jumlah_SMALL='1234', jumlah_MEDIUM='12345', jumlah_LARGE='1234555' WHERE id='64'
?>