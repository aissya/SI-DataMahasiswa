<?php

        $sql_cek = "SELECT * FROM tb_profil";
        $query_cek = mysqli_query($koneksi, $sql_cek);
		$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
		{

		
?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-flag"></i> Profil Institusi</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Institusi</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nama_profil" name="nama_profil" value="<?php echo $data_cek['nama_profil']; ?>"
					 readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>"
					 readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Bidang</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="bidang" name="bidang" value="<?php echo $data_cek['bidang']; ?>"
					 readonly/>
				</div>
			</div>

		</div>
	</form>
</div>

<?php
		}
	$sql = $koneksi->query("SELECT count(nim) as lokal from tb_mahasiswa");
	while ($data= $sql->fetch_assoc()) {
	
		$lokal=$data['lokal'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(nim) as putra from tb_mahasiswa where jurusan='Teknik Elektro'");
	while ($data= $sql->fetch_assoc()) {
	
		$putra=$data['putra'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(nim) as putri from tb_mahasiswa where jurusan='Teknik Mesin'");
	while ($data= $sql->fetch_assoc()) {
	
		$putri=$data['putri'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(nim) as one from tb_mahasiswa where jurusan='Teknik Sipil'");
	while ($data= $sql->fetch_assoc()) {
	
		$one=$data['one'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(nim) as two from tb_mahasiswa where jurusan='Administrasi Bisnis'");
	while ($data= $sql->fetch_assoc()) {
	
		$two=$data['two'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(nim) as three from tb_mahasiswa where jurusan='Akuntansi'");
	while ($data= $sql->fetch_assoc()) {
	
		$three=$data['three'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_pengguna) as boyong from tb_pengguna");
	while ($data= $sql->fetch_assoc()) {
	
		$boyong=$data['boyong'];
	}
?>

<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-primary">
			<div class="inner">
				<h3>
					<?php echo $lokal;  ?>
				</h3>

				<p>Jumlah Mahasiswa</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="index.php?page=data-mahasiswa" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>
					<?php echo $putra;  ?>
				</h3>

				<p>Teknik Elektro</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			<a href="#" class="small-box-footer">Informasi
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>
					<?php echo $putri;  ?>
				</h3>

				<p>Teknik Mesin</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			<a href="#" class="small-box-footer">Informasi
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>
					<?php echo $one;  ?>
				</h3>

				<p>Teknik Sipil</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			<a href="#" class="small-box-footer">Informasi
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>
					<?php echo $two;  ?>
				</h3>

				<p>Administrasi Bisnis</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			<a href="#" class="small-box-footer">Informasi
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-danger">
			<div class="inner">
				<h3>
					<?php echo $three; ?>
				</h3>

				<p>Akuntansi</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			<a href="#" class="small-box-footer">Informasi
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>
					<?php echo $boyong;  ?>
				</h3>

				<p>Pengguna Sistem</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-happy"></i>
			</div>
			<a href="#" class="small-box-footer">Informasi
			</a>
		</div>
	</div>