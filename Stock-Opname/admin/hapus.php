<?php 
include 'config.php';
$id=$_GET['id'];
$conn->query("delete from barang where id='$id'");
header("location:barang.php");
?>