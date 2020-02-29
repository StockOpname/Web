<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span> Data Barang</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Barang</button>
<br />
<br />

<?php
$periksa = $conn->query("select * from barang where jumlah <=3");
while ($q = mysqli_fetch_array($periksa)) {
	if ($q['jumlah'] <= 3) {
?>
		<script>
			$(document).ready(function() {
				$('#pesan_sedia').css("color", "red");
				$('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
			});
		</script>
<?php
		echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>" . $q['nama'] . "</a> yang tersisa sudah kurang dari 3 . silahkan pesan lagi !!</div>";
	}
}
?>
<?php
$per_hal = 10;
$jumlah_record = $conn->query("SELECT COUNT(*) from barang");
$jum = mysqli_result($jumlah_record, 0);
$halaman = ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Record</td>
			<td><?= $jum; ?></td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>
			<td><?= $halaman; ?></td>
		</tr>
	</table>
	<a style="margin-bottom:10px" href="lap_barang.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span> Cetak</a>
</div>
<form action="cari_act.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari barang di sini .." aria-describedby="basic-addon1" name="cari">
	</div>
</form>
<br />
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-2">Nama Barang</th>
		<th class="col-md-2">Jenis Barang</th>
		<!-- <th class="col-md-1 ">Harga Jual</th> -->
		<!--<th class="col-md-3">Harga Jual</th> -->
		<th class="col-md-1">Jumlah</th>
		<th class="col-md-1">Jumlah SMALL</th>
		<th class="col-md-1">Jumlah MEDIUM</th>
		<th class="col-md-1">Jumlah LARGE</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php
	if (isset($_GET['cari'])) {
		$cari = $_GET['cari'];
		$brg = $conn->query("select * from barang where nama like '$cari' or jenis like '$cari'");
	} else {
		$brg = $conn->query("select * from barang limit $start, $per_hal");
	}
	$no = 1;
	while ($b = mysqli_fetch_array($brg)) {

	?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $b['nama'] ?></td>
			<td><?= $b['jenis'] ?></td>
			<td><?= $b['jumlah'] ?></td>
			<td><?= $b['Jumlah_SMALL'] ?></td>
			<td><?= $b['Jumlah_MEDIUM'] ?></td>
			<td><?= $b['Jumlah_LARGE'] ?></td>
			<td>
				<a href="det_barang.php?id=<?= $b['id']; ?>" class="btn btn-info">Detail</a>
				<a href="edit.php?id=<?= $b['id']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus.php?id=<?= $b['id']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
	<?php
	}
	?>
	<!-- <tr>
		<td colspan="4">Total Modal</td>
		<td>
			<?php

			$x = $conn->query("select sum(modal) as total from barang");
			$xx = mysqli_fetch_array($x);
			echo "<b> Rp." . number_format($xx['total']) . ",-</b>";
			?>
		</td>
	</tr> -->
</table>
<ul class="pagination">
	<?php
	for ($x = 1; $x <= $halaman; $x++) {
	?>
		<li><a href="?page=<?= $x ?>"><?= $x ?></a></li>
	<?php
	}
	?>
</ul>
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Barang Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_brg_act.php" method="post">
					<div class="form-group">
						<label>Nama Barang</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Barang ..">
					</div>
					<div class="form-group">
						<label>Jenis</label>
						<input name="jenis" type="text" class="form-control" placeholder="Jenis Barang ..">
					</div>
					<!-- <div class="form-group">
						<label>Suplier</label>
						<input name="suplier" type="text" class="form-control" placeholder="Suplier ..">
					</div> -->
					<!-- <div class="form-group">
						<label>Harga Modal</label>
						<input name="modal" type="text" class="form-control" placeholder="Modal per unit">
					</div> -->
					<!-- <div class="form-group">
						<label>Harga Jual</label>
						<input name="harga" type="text" class="form-control" placeholder="Harga Jual per unit">
					</div> -->
					<div class="form-group">
						<label>Jumlah</label>
						<input name="jumlah" type="text" class="form-control" placeholder="Jumlah">
					</div>
					<div class="form-group">
						<label>Jumlah SMALL</label>
						<input name="Jumlah" type="text" class="form-control" placeholder="Jumlah SMALL">
					</div>
					<div class="form-group">
						<label>Jumlah MEDIUM</label>
						<input name="Jumlah MEDIUM" type="text" class="form-control" placeholder="Jumlah MEDIUM">
					</div>
					<div class="form-group">
						<label>Jumlah LARGE</label>
						<input name="Jumlah LARGE" type="text" class="form-control" placeholder="Jumlah LARGE">
					</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<input type="submit" class="btn btn-primary" value="Simpan">
			</div>
			</form>
		</div>
	</div>
</div>



<?php
include 'footer.php';

?>