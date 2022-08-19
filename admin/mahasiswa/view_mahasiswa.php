<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_mahasiswa WHERE nim='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="row">

	<div class="col-md-8">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Mahasiswa</h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
						<tr>
							<td style="width: 150px">
								<b>NIM</b>
							</td>
							<td>:
								<?php echo $data_cek['nim']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Jurusan</b>
							</td>
							<td>:
								<?php echo $data_cek['jurusan']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Nama</b>
							</td>
							<td>:
								<?php echo $data_cek['nama']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Prodi</b>
							</td>
							<td>:
								<?php echo $data_cek['prodi']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Alamat</b>
							</td>
							<td>:
								<?php echo $data_cek['alamat']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>No HP</b>
							</td>
							<td>:
								<?php echo $data_cek['no_hp']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Nama Orangtua / Wali</b>
							</td>
							<td>:
								<?php echo $data_cek['nama_ortu']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>No HP Orangtua / Wali</b>
							</td>
							<td>:
								<?php echo $data_cek['no_ortu']; ?>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="card-footer">
					<a href="?page=data-mahasiswa" class="btn btn-warning">Kembali</a>

					<a href="./report/cetak-mahasiswa.php?nim=<?php echo $data_cek['nim']; ?>" target=" _blank"
					 title="Cetak Data Mahasiswa" class="btn btn-primary">Print</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card card-success">
			<div class="card-header">
				<center>
					<h3 class="card-title">
						Foto Mahasiswa
					</h3>
				</center>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body">
				<div class="text-center">
					<img src="foto/<?php echo $data_cek['foto']; ?>" width="280px" />
				</div>

				<h3 class="profile-username text-center">
					<?php echo $data_cek['nim']; ?>
					-
					<?php echo $data_cek['nama']; ?>
				</h3>
			</div>
		</div>
	</div>

</div>