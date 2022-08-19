<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jurusan</label>
				<div class="col-sm-5">
					<select name="jurusan" id="jurusan" class="form-control">
						<option>- Pilih -</option>
						<option>Teknik Elektro</option>
						<option>Teknik Mesin</option>
						<option>Teknik Sipil</option>
						<option>Administrasi Bisnis</option>
						<option>Akuntansi</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIM</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM Anda (Tanpa Titik)" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Mahasiswa</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap Anda" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Program Studi</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="prodi" name="prodi" placeholder="Masukkan Program Studi Anda (D3-Teknik Informatika)" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Anda" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No HP</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan No Hp Anda" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Orangtua</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama_ortu" name="nama_ortu" placeholder="Masukkan Nama Orangtua / Wali Anda" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No HP Orangtua / Wali</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="no_ortu" name="no_ortu" placeholder="Masukkan No Hp Orangtua / Wali Anda" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Mahasiwa</label>
				<div class="col-sm-6">
					<input type="file" id="foto" name="foto">
					<p class="help-block">
						<font color="red">"Format file Jpg/Png"</font>
					</p>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-mahasiswa" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
	$sumber = @$_FILES['foto']['tmp_name'];
	$target = 'foto/';
	$nama_file = @$_FILES['foto']['name'];
	$pindah = move_uploaded_file($sumber, $target.$nama_file);

    if (isset ($_POST['Simpan'])){

		if(!empty($sumber)){
        $sql_simpan = "INSERT INTO tb_mahasiswa (nim, jurusan, nama, prodi, alamat, no_hp, nama_ortu, no_ortu, foto) VALUES (
            '".$_POST['nim']."',
			'".$_POST['jurusan']."',
			'".$_POST['nama']."',
			'".$_POST['prodi']."',
			'".$_POST['alamat']."',
			'".$_POST['no_hp']."',
			'".$_POST['nama_ortu']."',
			'".$_POST['no_ortu']."',
            '".$nama_file."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-mahasiswa';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-mahasiswa';
          }
      })</script>";
	}
	}elseif(empty($sumber)){
		echo "<script>
		Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {
			if (result.value) {
				window.location = 'index.php?page=add-mahasiswa';
			}
		})</script>";
	}
	}
     //selesai proses simpan data
