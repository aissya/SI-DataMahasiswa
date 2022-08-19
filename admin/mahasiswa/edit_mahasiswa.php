<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_mahasiswa WHERE nim='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data Mahasiswa</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIM</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nim" name="nim" value="<?php echo $data_cek['nim']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jurusan</label>
				<div class="col-sm-4">
					<select name="jurusan" id="jurusan" class="form-control">
						<option value="">-- Pilih --</option>
						<?php
                //cek data yg dipilih sebelumnya
                if ($data_cek['jurusan'] == "Teknik Elektro") echo "<option value='Teknik Elektro' selected>Teknik Elektro</option>";
                else echo "<option value='Teknik Elektro'>Teknik Elektro</option>";

                if ($data_cek['jurusan'] == "Teknik Mesin") echo "<option value='Teknik Mesin' selected>Teknik Mesin</option>";
                else echo "<option value='Teknik Mesin'>Teknik Mesin</option>";

				if ($data_cek['jurusan'] == "Teknik Sipil") echo "<option value='Teknik Sipil' selected>Teknik Sipil</option>";
                else echo "<option value='Teknik Sipil'>Teknik Sipil</option>";

				if ($data_cek['jurusan'] == "Adminstrasi Bisnis") echo "<option value='Adminstrasi Bisnis' selected>Adminstrasi Bisnis</option>";
                else echo "<option value='Adminstrasi Bisnis'>Adminstrasi Bisnis</option>";

				if ($data_cek['jurusan'] == "Akuntansi") echo "<option value='Akuntansi' selected>Akuntansi</option>";
                else echo "<option value='Akuntansi'>Akuntansi</option>";
            			?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Mahasiswa</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Program Studi</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="prodi" name="prodi" value="<?php echo $data_cek['prodi']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No HP</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data_cek['no_hp']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Orangtua / Wali</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama_ortu" name="nama_ortu" value="<?php echo $data_cek['nama_ortu']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No HP Orangtua / Wali</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="no_ortu" name="no_ortu" value="<?php echo $data_cek['no_ortu']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Mahasiswa</label>
				<div class="col-sm-6">
					<img src="foto/<?php echo $data_cek['foto']; ?>" width="160px" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Ubah Foto</label>
				<div class="col-sm-6">
					<input type="file" id="foto" name="foto">
					<p class="help-block">
						<font color="red">"Format file Jpg/Png"</font>
					</p>
				</div>
			</div>
		</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-mahasiswa" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
	$sumber = @$_FILES['foto']['tmp_name'];
	$target = 'foto/';
	$nama_file = @$_FILES['foto']['name'];
	$pindah = move_uploaded_file($sumber, $target.$nama_file);

	
if (isset ($_POST['Ubah'])){

    if(!empty($sumber)){
        $foto= $data_cek['foto'];
            if (file_exists("foto/$foto")){
            unlink("foto/$foto");}

        $sql_ubah = "UPDATE tb_mahasiswa SET
			jurusan='".$_POST['jurusan']."',
			nama='".$_POST['nama']."',
			prodi='".$_POST['prodi']."',
			alamat='".$_POST['alamat']."',
			no_hp='".$_POST['no_hp']."',
			nama_ortu='".$_POST['nama_ortu']."',
			no_ortu='".$_POST['no_ortu']."',
			foto='".$nama_file."'		
            WHERE nim='".$_POST['nim']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
		$sql_ubah = "UPDATE tb_mahasiswa SET
		jurusan='".$_POST['jurusan']."',
		nama='".$_POST['nama']."',
		prodi='".$_POST['prodi']."',
		alamat='".$_POST['alamat']."',
		no_hp='".$_POST['no_hp']."',
		nama_ortu='".$_POST['nama_ortu']."',
		no_ortu='".$_POST['no_ortu']."',		
		WHERE nim='".$_POST['nim']."'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
        }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-mahasiswa';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-mahasiswa';
            }
        })</script>";
    }
}

