<?php
	include "../inc/koneksi.php";
	
	$nim = $_GET['nim'];

	$sql_cek = "SELECT * FROM tb_profil";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
	{
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Cetak Data Mahasiswa</title>
</head>

<body>
	<center>

		<h2>
			<?php echo $data_cek['nama_profil']; ?>
		</h2>
		<h3>
			<?php echo $data_cek['alamat']; ?>
			<hr / size="2px" color="black">

			<?php
			}

			$sql_tampil = "select * from tb_mahasiswa where nim='$nim'";
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
		?>
	</center>

	<center>
		<h4>
			<u>DATA MAHASISWA</u>
		</h4>
	</center>

	<table border="1" cellspacing="0" style="width: 100%" align="center">
		<tbody>
			<tr>
				<td>NIM</td>
				<td>:</td>
				<td>
					<?php echo $data['nim']; ?>
				</td>
				<td rowspan="8" align="center">
					<img src="../foto/<?php echo $data['foto']; ?>" width="150px" />
				</td>
			</tr>
			<tr>
				<td>Jurusan</td>
				<td>:</td>
				<td>
					<?php echo $data['jurusan']; ?>
				</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<?php echo $data['nama']; ?>
				</td>
			</tr>
			<tr>
				<td>Program Studi</td>
				<td>:</td>
				<td>
					<?php echo $data['prodi']; ?>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td>
					<?php echo $data['alamat']; ?>
				</td>
			</tr>
			<tr>
				<td>No HP</td>
				<td>:</td>
				<td>
					<?php echo $data['no_hp']; ?>
				</td>
			</tr>
			<tr>
				<td>Nama Orangtua / Wali</td>
				<td>:</td>
				<td>
					<?php echo $data['nama_ortu']; ?>
				</td>
			</tr>
			<tr>
				<td>No HP Orangtua / Wali</td>
				<td>:</td>
				<td>
					<?php echo $data['no_ortu']; ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>


	<script>
		window.print();
	</script>

</body>

</html>