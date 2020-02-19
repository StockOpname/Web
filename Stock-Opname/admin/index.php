<?php 
include 'header.php';
?>

<?php
$a = $conn->query("select * from barang_laku");
?>

<div class="col-md-10">
	<h3>Selamat Datang</h3>	
    <h3>Website Stok Opname</h3>
    <h3>PT. MATAHARI SURYA MITRA PANGAN</h3>
</div>
<!-- kalender -->
<div class="pull-right">
	<div id="kalender"></div>
</div>

<?php 
include 'footer.php';

?>