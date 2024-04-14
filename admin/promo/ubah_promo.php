<?php
$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM promo WHERE kd_promo = '$id'");
$data = $ambil->fetch_assoc();
?>
<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<h2 class="">Ubah Promo</h2>
		</div>
	</div>
	<hr />
	<form method="post" enctype="multipart/form-data">
		<div class="form-group mb-3">
			<label class="form-label">Judul</label>
			<input type="text" name="judul_promo" class="form-control" required=""
				value="<?php echo $data['judul_promo']; ?>">
		</div>
		<div class="form-group mb-3">
			<label class="form-label">Deskripsi</label>
			<textarea class="form-control" name="deskripsi_promo" style="resize: none;"
				rows="6"><?php echo $data['deskripsi_promo']; ?></textarea>
		</div>
		<div class="form-group mb-3">
			<label class="form-label">Syarat</label>
			<textarea class="form-control" name="syarat_promo" style="resize: none;"
				rows="6"><?php echo $data['syarat_promo']; ?></textarea>
		</div>
		<div class="form-group mb-3">
			<label class="form-label">Foto Promo</label><br>
			<img src="../foto_promo/<?php echo $data['foto_promo']; ?>" width="200">
		</div>
		<div class="form-group mb-3">
			<label class="form-label">Ubah Foto Promo</label>
			<span style="font-size: 10px; font-weight: lighter; color: red;"> (Wajib di ganti walau foto yang
				sama)</span>
			<input type="file" name="foto_promo" class="form-control">
		</div>
		<button name="simpan" class="btn btn-success" id="btnDefault" style="width: 100%; padding: 12px 0;">Simpan
			Promo</button>
	</form>
	<?php
    if (isset($_POST['simpan'])) {
	    $judul = $_POST['judul_promo'];
	    $deskripsi = $_POST['deskripsi_promo'];
	    $syarat = $_POST['syarat_promo'];
	    $nama_foto = $_FILES['foto_promo']['name'];
	    $lokasi = $_FILES['foto_promo']['tmp_name'];

	    $desk = $koneksi->real_escape_string($deskripsi);
	    $syar = $koneksi->real_escape_string($syarat);

	    //Jika foto di rubah
    	if (!empty($lokasi)) {
		    move_uploaded_file($lokasi, "../foto_promo/$nama_foto");

		    $koneksi->query("UPDATE promo SET judul_promo='$judul', deskripsi_promo='$desk', syarat_promo='$syar', foto_promo='$nama_foto' WHERE kd_promo='$id'");
	    } else {
		    $koneksi->query("UPDATE promo SET judul_promo='$judul', deskripsi_promo='$desk', syarat_promo='$syar', foto_promo='$nama_foto' WHERE kd_promo='$id'");
	    }

	    echo "<script>alert('Data Promo Berhasil di Ubah');
		document.location='?halaman=promo'</script>;";
    }
    ?>
</div>