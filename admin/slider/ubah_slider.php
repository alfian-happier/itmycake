<?php
$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM carousel WHERE id_slider = '$id'");
$data = $ambil->fetch_assoc();
?>
<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<h2 class="">Ubah Slider</h2>
		</div>
	</div>
	<hr />
	<form method="post" enctype="multipart/form-data">
		<div class="form-group mb-3">
			<label class="form-label">Judul</label>
			<input type="text" name="judul" class="form-control" maxlength="30" required=""
				value="<?php echo $data['judul']; ?>">
		</div>
		<div class="form-group mb-3">
			<label class="form-label">Deskripsi</label>
			<input type="text" name="deskripsi" class="form-control" required=""
				value="<?php echo $data['deskripsi']; ?>">
		</div>
		<div class="form-group mb-3">
			<label class="form-label">Foto Slider</label><br>
			<img src="../foto_slider/<?php echo $data['foto_slider']; ?>" width="200" style="border-radius: 8px;">
		</div>
		<div class="form-group mb-3">
			<label class="form-label">Ubah Foto Slider<span style="font-size: 12px; font-weight: normal; color: red;">
					(Wajib di ganti walau foto yang sama) & (Ukuran Foto : 1280 x 568 px)</span></label>
			<input type="file" name="foto_slider" class="form-control">
		</div>
		<button name="simpan" class="btn btn-success" id="btnDefault" style="width: 100%; padding: 12px 0;">Simpan
			Slider</button>
	</form>
	<?php
    if (isset($_POST['simpan'])) {
	    $judul = $_POST['judul'];
	    $deskripsi = $_POST['deskripsi'];

	    $nama_foto_slider = $_FILES['foto_slider']['name'];
	    $lokasi = $_FILES['foto_slider']['tmp_name'];

	    //Jika foto di rubah
    	if (!empty($lokasi)) {
		    move_uploaded_file($lokasi, "../foto_slider/$nama_foto_slider");

		    $koneksi->query("UPDATE carousel SET judul='$judul', deskripsi='$deskripsi', foto_slider='$nama_foto_slider' WHERE id_slider='$id'");
	    } else {
		    $koneksi->query("UPDATE carousel SET judul='$judul', deskripsi='$deskripsi', foto_slider='$nama_foto_slider' WHERE id_slider='$id'");
	    }

	    echo "<script>alert('Data Slider Berhasil di Ubah');
		document.location='?halaman=slider'</script>;";
    }
    ?>
</div>