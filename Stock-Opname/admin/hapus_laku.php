<?php 
include 'config.php';
$id=$_GET['id'];
$jumlah=$_GET['jumlah'];
$nama=$_GET['nama'];

$a = $conn->query("select jumlah from barang where nama='$nama'");
$b = mysqli_fetch_array($a);
$kembalikan = $b['jumlah'] + $jumlah;
$c = $conn->query("update barang set jumlah='$kembalikan' where nama='$nama'");
$conn->query("delete from barang_laku where id='$id'");
header("location:barang_laku.php");

 ?>