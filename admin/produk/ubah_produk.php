<?php
$id = $_GET['id'];
$ambil = "SELECT * FROM produk WHERE kd_produk = '$id'";
$ambils = mysqli_query($koneksi, $ambil);
$data = mysqli_fetch_assoc($ambils);

$connection = "SELECT * FROM category";
$result = mysqli_query($koneksi, $connection);

$ambil2 = "SELECT * FROM prop_produk WHERE kd_produk = '$id'";
$count = mysqli_query($koneksi, $ambil2);
$counts = mysqli_num_rows($count);
$tes = mysqli_fetch_row($count);

?>
<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<h2 class="">Ubah Produk</h2>
		</div>
	</div>
	<hr />
	<form method="post" enctype="multipart/form-data">
		<div class="form-group mb-3">
			<label class="form-label">Nama Produk</label>
			<input type="text" name="nama_produk" class="form-control" maxlength="30" required=""
				value="<?php echo $data['nama_produk']; ?>">
		</div>
		<div class="form-group mb-3">
			<label for="" class="form-label">Category</label>
			<span style="font-size: 10px; font-weight: lighter; color: red;"> (Wajib di ganti)*</span>
			<select class="form-control" name="nama_category" id="nama_category">
				<?php foreach ($result as $key => $value) { ?>
				<option value="<?= $value['nama_category']; ?>">
					<?= $value['nama_category']; ?>
				</option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group mb-3">
			<label class="form-label">Harga (Rp.)</label>
			<input type="number" name="harga" class="form-control" maxlength="6" required=""
				value="<?php echo $data['harga_produk']; ?>">
		</div>
		<div class="form-group mb-3">
			<label class="form-label">Foto Produk</label><br>
			<img src="../foto_produk/<?php echo $data['foto_produk']; ?>" width="200">
		</div>
		<div class="form-group mb-3">
			<label class="form-label">Ubah Foto Produk</label>
			<span style="font-size: 10px; font-weight: lighter; color: red;"> (Wajib di ganti walau foto yang
				sama)*</span>
			<input type="file" name="foto_produk" class="form-control">
		</div>
		<H4>Detail Produk</H4>
		<div class="sub-prop mb-3">
			<div class="form-group mb-3">
				<label for="" class="form-label">Size, Harga, dan Foto</label>
				<?php foreach ($count as $key => $rows): ?>
				<div id="row" style="margin-bottom: 1%;">

					<div class="input-group-prepend" style="display: flex;">
						<button class="btn btn-danger" id="DeleteRow" type="button" style="margin-right: 10px;">
							<i class="fa-solid fa-trash"></i>
							Delete
						</button>
						<input type="hidden" name="id_prop[]" class="form-control m-input"
							value="<?php echo $rows['id_prop']; ?>" style="width: 10%">
						<input type=" text" name="size[]" class="form-control m-input" maxlength="40" required=""
							style="width: 10%;" value="<?= $rows['size']; ?>">

						<input type="text" name="price[]" class="form-control m-input" maxlength="40" required=""
							placeholder="Masukkan Harga" style="margin-left: 10px; width: 20%;"
							value="<?= $rows['price']; ?>">

						<input type="file" name="foto[]" class="form-control m-input" required=""
							style="margin-left: 10px; width: 20%;" value="<?= $rows['foto']; ?>">
						<img src="../foto_produk/<?php echo $rows['foto']; ?>" width="68" height="38"
							style="border-radius: 4px; margin-left: 4px;">
					</div>

				</div>
				<?php endforeach; ?>
			</div>
			<div class="form-group mb-3">
				<label class="form-label">Deskripsi</label>
				<textarea name="deskripsi" class="form-control" required=""
					style="resize: none;"><?php echo $data['deskripsi_produk']; ?></textarea>
			</div>
		</div>

		<button name="simpan" class="btn btn-success" id="btnDefault" style="width: 100%; padding: 12px 0;">Ubah
			Produk</button>
	</form>
	<?php
    if (isset($_POST['simpan'])) {
	    $nama_produk = $_POST['nama_produk'];
	    $nama_category = $_POST['nama_category'];
	    $harga = $_POST['harga'];
	    $size = $_POST['size'];
	    $price = $_POST['price'];
	    $deskripsi = $_POST['deskripsi'];
	    $fotoproduk = $_FILES['foto_produk']['name'];
	    $foto = $_FILES['foto']['name'];
	    $lokasi = $_FILES['foto']['tmp_name'];
	    $counts = count($_POST["id_prop"]);

	    $desk = $koneksi->real_escape_string($deskripsi);


	    //Jika foto di rubah
    	if (!empty($lokasi)) {
		    //move_uploaded_file($lokasi, "../foto_produk/$foto");
    		$sql = "UPDATE produk SET nama_produk='$nama_produk',nama_category='$nama_category',harga_produk='$harga',foto_produk='$fotoproduk',deskripsi_produk='$desk' WHERE kd_produk='$id' ";
		    $update = $koneksi->query($sql);

		    for ($i = 0; $i < $counts; $i++) {
			    $fotos = $foto[$i];
			    $fototmp = $lokasi[$i];
			    $targetPath = "../foto_produk/" . $fotos;
			    if (move_uploaded_file($fototmp, $targetPath)) {

				    $sql1 = "UPDATE prop_produk SET size='" . $size[$i] . "', price='" . $price[$i] . "',foto='" . $fotos . "' WHERE id_prop='" . $_POST['id_prop'][$i] . "'";
				    $result1 = mysqli_query($koneksi, $sql1);
			    }

		    }

	    } else {

		    $sql = "UPDATE produk SET nama_produk='$nama_produk',nama_category='$nama_category',harga_produk='$harga',foto_produk='$fotoproduk',deskripsi_produk='$deskripsi' WHERE kd_produk='$id' ";
		    $update = $koneksi->query($sql);
		    //$newOrderId = mysqli_insert_id($koneksi);
    
		    for ($i = 0; $i < $counts; $i++) {
			    $sql1 = "UPDATE prop_produk SET size='" . $size[$i] . "', price='" . $price[$i] . "',foto='" . $fotos . "' WHERE id_prop='" . $_POST['id_prop'][$i] . "'";
			    $result1 = mysqli_query($koneksi, $sql1);
		    }

	    }

	    echo "<script>alert('Data Produk Berhasil di Ubah');
			document.location = '?halaman=produk'</script>;";
    }
    ?>
</div>