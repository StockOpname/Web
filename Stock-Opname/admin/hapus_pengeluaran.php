<?php 
include 'config.php';
$id=$_GET['id'];
$conn->query("delete from pengeluaran where id ='$id'");
header("location:pengeluaran.php");

 ?>