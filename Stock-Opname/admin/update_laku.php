<?php
include 'config.php';

$id = $_POST['id'];
$date = strtotime($_POST['tanggal']);
$tanggal = date('Y-m-d', $date);
$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];
$jumlah_SMALL = $_POST['Jumlah_SMALL'];
$jumlah_MEDIUM = $_POST['Jumlah_MEDIUM'];
$jumlah_LARGE = $_POST['Jumlah_LARGE'];

$conn->query("UPDATE barang_laku SET tanggal='$tanggal', nama='$nama', jumlah='$jumlah', jumlah_SMALL='$jumlah_SMALL', jumlah_MEDIUM='$jumlah_MEDIUM', jumlah_LARGE='$jumlah_LARGE' WHERE id='$id'");
header("location:barang_laku.php?pesan=update");

