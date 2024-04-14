<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<h2 class="">Tambah Category/Menu</h2>
		</div>
	</div>
	<hr />
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-group mb-3">
			<label for="" class="form-label">Nama Category</label>
			<input type="text" name="nama_category" class="form-control" maxlength="30" required="">
		</div>
		<div class="form-group mb-3">
			<label for="" class="form-label">Foto Category</label>
			<input type="file" name="foto_category" class="form-control" required="">
		</div>
		<button name="tambah" class="btn btn-success" id="btnDefault" style="width: 100%; padding: 12px 0;">Tambah
			Menu</button>
	</form>
	<?php
    if (isset($_POST['tambah'])) {
	    $nama_category = $_POST['nama_category'];
	    $foto_category = $_FILES['foto_category']['name'];
	    $lokasi = $_FILES['foto_category']['tmp_name'];
	    move_uploaded_file($lokasi, "../foto_category/" . $foto_category);

	    $koneksi->query("INSERT INTO category (nama_category, foto_category) VALUES 
			('$nama_category','$foto_category')");

	    echo "<script>alert('Category/Menu Berhasil di Tambah');
		document.location='?halaman=category';</script>";
    }
    ?>
</div>