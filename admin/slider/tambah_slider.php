<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<h2>Tambah Slider</h2>
		</div>
	</div>
	<hr />
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-group mb-3">
			<label for="" class="form-label">Judul</label>
			<input type="text" name="judul" class="form-control" maxlength="30" required="">
		</div>
		<div class="form-group mb-3">
			<label for="" class="form-label">Deskripsi</label>
			<input type="text" name="deskripsi" class="form-control" required="">
		</div>
		<div class="form-group mb-3">
			<label for="" class="form-label">Foto Slider</label><span style="font-size: 12px; color: red;">
				(Ukuran Foto : 1280 x 568 px)</span>
			<input type="file" name="foto_slider" class="form-control" required="">
		</div>
		<button name="tambah" class="btn btn-success" id="btnDefault" style="width: 100%; padding: 12px 0;">Tambah
			Slider</button>
	</form>
	<?php
    if (isset($_POST['tambah'])) {
	    $judul = $_POST['judul'];
	    $deskripsi = $_POST['deskripsi'];
	    $foto_slider = $_FILES['foto_slider']['name'];
	    $lokasi = $_FILES['foto_slider']['tmp_name'];
	    move_uploaded_file($lokasi, "../foto_slider/" . $foto_slider);

	    $koneksi->query("INSERT INTO carousel (judul, deskripsi, foto_slider) VALUES 
			('$judul', '$deskripsi', '$foto_slider')");

	    echo "<script>alert('Slider Berhasil di Tambah');
		document.location='?halaman=slider';</script>";
    }
    ?>
</div>