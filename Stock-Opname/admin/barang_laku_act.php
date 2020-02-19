<?php

include 'config.php';
$tgl = $_POST['tanggal'];
$tgl = date('Y-m-d', strtotime($tgl));
$nama = $_POST['nama'];
// $harga=$_POST['harga'];
$jumlah = $_POST['jumlah'];
$Jumlah_SMALL = $_POST['Jumlah_SMALL'];
$Jumlah_MEDIUM = $_POST['Jumlah_MEDIUM'];
$Jumlah_LARGE = $_POST['Jumlah_LARGE'];

$dt = $conn->query("select * from barang where nama='$nama'");
$data = mysqli_fetch_array($dt);
$sisa = $data['jumlah'] - $jumlah;
$conn->query("update barang set jumlah='$sisa' where nama='$nama'");

// $modal=$data['modal'];
// $laba=$harga-$modal;
// $labaa=$laba*$jumlah;
// $total_harga=$harga*$jumlah;
$conn->query("insert into barang_laku values('','$tgl','$nama','$jumlah','$Jumlah_SMALL','$Jumlah_MEDIUM','$Jumlah_LARGE')") or die($conn->connect_error);
header("location:barang_laku.php");
