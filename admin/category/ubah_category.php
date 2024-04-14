<?php
$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM category WHERE id_category = '$id'");
$data = $ambil->fetch_assoc();
?>
<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<h2 class="">Ubah Category/Menu</h2>
		</div>
	</div>
	<hr />
	<form method="post" enctype="multipart/form-data">
		<div class="form-group mb-3">
			<label class="form-label">Nama Category</label>
			<input type="text" name="nama_category" class="form-control" maxlength="30" required=""
				value="<?php echo $data['nama_category']; ?>">
		</div>
		<div class="form-group mb-3">
			<label class="form-label">Foto Category</label><br>
			<img src="../foto_category/<?php echo $data['foto_category']; ?>" width="200" style="border-radius: 8px;">
		</div>
		<div class="form-group mb-3">
			<label class="form-label">Ubah Foto Category</label>
			<span style="font-size: 10px; font-weight: lighter; color: red;"> (Wajib di ganti walau foto yang
				sama)</span>
			<input type="file" name="foto_category" class="form-control">
		</div>
		<button name="simpan" class="btn btn-success" id="btnDefault" style="width: 100%; padding: 12px 0;">Simpan
			Menu</button>
	</form>
	<?php
    if (isset($_POST['simpan'])) {
	    $nama_category = $_POST['nama_category'];

	    $nama_foto_category = $_FILES['foto_category']['name'];
	    $lokasi = $_FILES['foto_category']['tmp_name'];

	    //Jika foto di rubah
    	if (!empty($lokasi)) {
		    move_uploaded_file($lokasi, "../foto_category/$nama_foto_category");

		    $koneksi->query("UPDATE category SET nama_category='$nama_category', foto_category='$nama_foto_category' WHERE id_category='$id'");
	    } else {
		    $koneksi->query("UPDATE category SET nama_category='$nama_category', foto_category='$nama_foto_category' WHERE id_category='$id'");
	    }

	    echo "<script>alert('Data Category Berhasil di Ubah');
		document.location='?halaman=category'</script>;";
    }
    ?>
</div>