<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<h2 class="">Tambah Promo</h2>
		</div>
	</div>
	<hr />
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-group mb-3">
			<label for="" class="form-label">Judul</label>
			<input type="text" name="judul_promo" class="form-control" required="">
		</div>
		<div class="form-group mb-3">
			<label for="" class="form-label">Deskripsi</label>
			<textarea class="form-control" name="deskripsi_promo" style="resize: none;" rows="6"></textarea>
		</div>
		<div class="form-group mb-3">
			<label for="" class="form-label">Syarat</label>
			<textarea class="form-control" name="syarat_promo" style="resize: none;" rows="6"></textarea>
		</div>
		<div class="form-group mb-3">
			<label for="" class="form-label">Foto Promo</label>
			<input type="file" name="foto_promo" class="form-control" required="">
		</div>
		<button name="tambah" class="btn btn-success" id="btnDefault" style="width: 100%; padding: 12px 0;">Tambah
			Promo</button>
	</form>
	<?php
    if (isset($_POST['tambah'])) {
	    $judul = $_POST['judul_promo'];
	    $deskripsi = $_POST['deskripsi_promo'];
	    $syarat = $_POST['syarat_promo'];
	    $foto = $_FILES['foto_promo']['name'];
	    $lokasi = $_FILES['foto_promo']['tmp_name'];
	    move_uploaded_file($lokasi, "../foto_promo/" . $foto);

	    $desk = $koneksi->real_escape_string($deskripsi);
	    $syar = $koneksi->real_escape_string($syarat);
	    $koneksi->query(
	    	"INSERT INTO promo (judul_promo, deskripsi_promo, syarat_promo, foto_promo) VALUES 
			('$judul','$desk','$syar','$foto')"
	    );

	    echo "<script>alert('Promo Berhasil di Tambah');
		document.location='?halaman=promo';</script>";
    }
    ?>
</div>