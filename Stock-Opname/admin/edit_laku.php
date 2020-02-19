<?php
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span> Edit Barang</h3>
<a class="btn" href="barang_laku.php"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>

<?php
$id_brg = $_GET['id'];

$det = $conn->query("select * from barang_laku where id='$id_brg'") or die($conn->connect_error);
while ($d = mysqli_fetch_array($det)) {
?>
	<form action="update_laku.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?= $d['id'] ?>"></td>
			</tr>

			<tr>
				<td>Tanggal</td>
				<td><input name="tanggal" type="text" class="form-control" id="tanggal" autocomplete="off" value="<?= $d['tanggal'] ?>"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>
					<select class="form-control" name="nama">
						<?php
						$brg = $conn->query("select * from barang");
						while ($b = mysqli_fetch_array($brg)) {
						?>
							<option <?php if ($d['nama'] == $b['nama']) {
										echo "selected";
									} ?> value="<?= $b['nama']; ?>"><?= $b['nama'] ?></option>
						<?php
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><input type="text" class="form-control" name="jumlah" value="<?= $d['jumlah'] ?>"></td>
			</tr>
			<tr>
				<td>Jumlah SMALL</td>
				<td><input type="text" class="form-control" name="Jumlah_SMALL" value="<?= $d['Jumlah_SMALL'] ?>"></td>
			</tr>
			<tr>
				<td>Jumlah MEDIUM</td>
				<td><input type="text" class="form-control" name="Jumlah_MEDIUM" value="<?= $d['Jumlah_MEDIUM'] ?>"></td>
			</tr>
			<tr>
				<td>Jumlah LARGE</td>
				<td><input type="text" class="form-control" name="Jumlah_LARGE" value="<?= $d['Jumlah_LARGE'] ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
<?php

}
?>
<script type="text/javascript">
	$(document).ready(function() {

		$('#tanggal').datepicker({
			dateFormat: 'yy-mm-dd'
		});

	});
</script>
<?php
include 'footer.php';

?>