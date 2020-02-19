<?php
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span> Detail Barang</h3>
<a class="btn" href="barang.php"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>

<?php
$id_brg = $_GET['id'];


$det = $conn->query("select * from barang where id='$id_brg'") or die($conn->connect_error);
while ($d = mysqli_fetch_array($det)) {
?>
	<table class="table">
		<tr>
			<td>Nama</td>
			<td><?= $d['nama'] ?></td>
		</tr>
		<tr>
			<td>Jenis</td>
			<td><?= $d['jenis'] ?></td>
		</tr>
		<!-- <tr>
			<td>Suplier</td>
			<td><?= $d['suplier'] ?></td>
		</tr> -->
		<!-- <tr>
			<td>Modal</td>
			<td>Rp.<?= number_format($d['modal']); ?>,-</td>
		</tr>
		<tr>
			<td>Harga</td>
			<td>Rp.<?= number_format($d['harga']) ?>,-</td>
		</tr> -->
		<tr>
			<td>Jumlah</td>
			<td><?= $d['jumlah'] ?></td>
		</tr>
		<tr>
			<td>Jumlah SMALL</td>
			<td><?= $d['Jumlah SMALL'] ?></td>
		</tr>
		<tr>
			<td>Jumlah MEDIUM</td>
			<td><?= $d['Jumlah MEDIUM'] ?></td>
		</tr>
		<tr>
			<td>Jumlah LARGE</td>
			<td><?= $d['Jumlah LARGE'] ?></td>
		</tr>
		<!-- <tr>
			<td>Sisa</td>
			<td><?= $d['sisa'] ?></td>
		</tr> -->
	</table>
<?php
}
?>
<?php include 'footer.php'; ?>