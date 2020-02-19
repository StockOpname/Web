<?php include 'header.php';	?>

<h3><span class="glyphicon glyphicon-briefcase"></span> Data Barang Terjual</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-pencil"></span> Entry</button>
<form action="" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
		<select type="submit" name="tanggal" class="form-control" onchange="this.form.submit()">
			<option>Pilih tanggal ..</option>
			<?php
			$pil = $conn->query("select distinct tanggal from barang_laku order by tanggal desc");
			while ($p = mysqli_fetch_array($pil)) {
			?>
				<option><?= $p['tanggal'] ?></option>
			<?php
			}
			?>
		</select>
	</div>

</form>
<br />
<?php
if (isset($_GET['tanggal'])) {
	$tanggal = $_GET['tanggal'];
	$tg = "lap_barang_laku.php?tanggal='$tanggal'";
?><a style="margin-bottom:10px" href="<?= $tg ?>" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span> Cetak</a><?php
																																							} else {
																																								$tg = "lap_barang_laku.php";
																																							}
																																								?>

<br />
<?php
if (isset($_GET['tanggal'])) {
	echo "<h4> Data Penjualan Tanggal  <a style='color:blue'> " . $_GET['tanggal'] . "</a></h4>";
}
?>
<table class="table">
	<tr>
		<th>No</th>
		<th>Tanggal</th>
		<th>Nama Barang</th>
		<!-- <th>Harga Terjual /pc</th>
		<th>Total Harga</th> -->
		<th>Jumlah</th>
		<th>Jumlah SMALL</th>
		<th>Jumlah MEDIUM</th>
		<th>Jumlah LARGE</th>
		<!-- <th>Laba</th>	 -->
		<th>Opsi</th>
	</tr>
	<?php
	if (isset($_GET['tanggal'])) {
		$tanggal = $_GET['tanggal'];
		$brg = $conn->query("select * from barang_laku where tanggal like '$tanggal' order by tanggal desc");
	} else {
		$brg = $conn->query("select * from barang_laku order by tanggal desc");
	}
	$no = 1;
	while ($b = mysqli_fetch_array($brg)) {

	?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $b['tanggal'] ?></td>
			<td><?= $b['nama'] ?></td>
			<td><?= $b['jumlah'] ?></td>
			<td><?= $b['Jumlah_SMALL'] ?></td>
			<td><?= $b['Jumlah_MEDIUM'] ?></td>
			<td><?= $b['Jumlah_LARGE'] ?></td>
			<td>
				<a href="edit_laku.php?id=<?= $b['id']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_laku.php?id=<?= $b['id']; ?>&jumlah=<?= $b['jumlah'] ?>&nama=<?= $b['nama']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>

	<?php
	}
	?>
	<!-- <tr>
		<td colspan="7">Total Pemasukan</td>
		<?php
		if (isset($_GET['tanggal'])) {
			$tanggal = $_GET['tanggal'];
			$x = $conn->query("select sum(total_harga) as total from barang_laku where tanggal='$tanggal'");
			$xx = mysqli_fetch_array($x);
			echo "<td><b> Rp." . number_format($xx['total']) . ",-</b></td>";
		} else {
		}

		?>
	</tr>
	<tr>
		<td colspan="7">Total Laba</td>
		<?php
		if (isset($_GET['tanggal'])) {
			$tanggal = $_GET['tanggal'];
			$x = $conn->query("select sum(laba) as total from barang_laku where tanggal='$tanggal'");
			$xx = mysqli_fetch_array($x);
			echo "<td><b> Rp." . number_format($xx['total']) . ",-</b></td>";
		} else {
		}

		?>
	</tr> -->
</table>

<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Penjualan
			</div>
			<div class="modal-body">
				<form action="barang_laku_act.php" method="post">
					<div class="form-group">
						<label>Tanggal</label>
						<input name="tanggal" type="text" class="form-control" id="tanggal" autocomplete="off">
					</div>
					<div class="form-group">
						<label>Nama Barang</label>
						<select class="form-control" name="nama">
							<?php
							$brg = $conn->query("select * from barang");
							while ($b = mysqli_fetch_array($brg)) {
							?>
								<option value="<?= $b['nama']; ?>"><?= $b['nama'] ?></option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Jumlah</label>
						<input name="jumlah" type="text" class="form-control" placeholder="Jumlah" autocomplete="off">
					</div>
					<div class="form-group">
						<label>Jumlah SMALL</label>
						<input name="Jumlah SMALL" type="text" class="form-control" placeholder="Jumlah SMALL" autocomplete="off">
					</div>
					<div class="form-group">
						<label>Jumlah MEDIUM</label>
						<input name="Jumlah MEDIUM" type="text" class="form-control" placeholder="Jumlah MEDIUM" autocomplete="off">
					</div>
					<div class="form-group">
						<label>Jumlah LARGE</label>
						<input name="Jumlah LARGE" type="text" class="form-control" placeholder="Jumlah LARGE" autocomplete="off">
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<input type="reset" class="btn btn-danger" value="Reset">
				<input type="submit" class="btn btn-primary" value="Simpan">
			</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$("#tanggal").datepicker({
			dateFormat: 'yy/mm/dd'
		});
	});
</script>
<?php include 'footer.php'; ?>