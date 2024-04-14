<?php
include '../koneksi.php';

$connection = "SELECT * FROM category";
$result = mysqli_query($koneksi, $connection);

$prop_produk = "SELECT kd_produk FROM prop_produk";

?>

<body>
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2 class="">Tambah Produk</h2>
			</div>
		</div>
		<hr />
		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group mb-3">
				<label for="" class="form-label">Nama Produk</label>
				<input type="text" name="nama_produk" class="form-control" maxlength="30" required="">
			</div>
			<div class="form-group mb-3">
				<label for="" class="form-label">Category</label>
				<select class="form-control" name="nama_category" id="nama_category">
					<?php foreach ($result as $key => $value) { ?>
					<option value="<?= $value['nama_category']; ?>">
						<?= $value['nama_category']; ?>
					</option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group mb-3">
				<label for="" class="form-label">Harga (Rp.)</label>
				<input type="number" name="harga" class="form-control" maxlength="6" required="">
			</div>
			<div class="form-group mb-3">
				<label for="" class="form-label">Foto Produk</label>
				<input type="file" name="foto_produk" class="form-control" maxlength="6" required="">
			</div>
			<h4>Detail Produk</h4>
			<div class="sub-prop mb-3">
				<div class="form-group mb-3">
					<label for="" class="form-label">Size, Harga, dan Foto</label>
					<div id="row" style="margin-bottom: 1%;">
						<div class="input-group-prepend" style="display: flex;">
							<button class="btn btn-danger" id="DeleteRow" type="button" style="margin-right: 10px;">
								<i class="fa-solid fa-trash"></i>
								Delete
							</button>
							<input type="text" name="size[]" class="form-control m-input" maxlength="40" required=""
								placeholder="Size" style="width: 10%;">
							<input type="text" name="price[]" class="form-control m-input" maxlength="40" required=""
								placeholder="Harga" style="margin-left: 10px; width: 20%;">
							<input type="file" name="foto[]" class="form-control m-input" required=""
								style="margin-left: 10px; width: 20%;">
						</div>
					</div>

					<div id="newinput"></div>
					<button id="rowAdder" type="button" class="btn btn-primary">
						<i class="fa-regular fa-square-plus"></i>
						</span> Add
					</button>
				</div>
				<div class="form-group mb-3">
					<label for="" class="form-label">Deskripsi</label>
					<textarea name="deskripsi" class="form-control" required="" style="resize: none;"></textarea>
				</div>
			</div>


			<button name="tambah" class="btn btn-success" id="btnDefault" style="width: 100%; padding: 12px 0;">Tambah
				Produk</button>
		</form>
		<?php
        if (isset($_POST['tambah'])) {
	        $nama_produk = $_POST['nama_produk'];
	        $nama_category = $_POST['nama_category'];
	        $harga = $_POST['harga'];
	        $size = $_POST['size'];
	        $price = $_POST['price'];
	        $deskripsi = $_POST['deskripsi'];
	        $fotoproduk = $_FILES['foto_produk']['name'];
	        $foto = $_FILES['foto']['name'];
	        $lokasi = $_FILES['foto']['tmp_name'];
	        //move_uploaded_file($lokasi, "../foto_produk/" . $foto);
        
	        $desk = $koneksi->real_escape_string($deskripsi);
	        $sql = "INSERT INTO produk (nama_produk,nama_category,harga_produk,foto_produk,deskripsi_produk) VALUES ('$nama_produk','$nama_category','$harga','$fotoproduk','$desk')";

	        $insert = $koneksi->query($sql);

	        $newOrderId = mysqli_insert_id($koneksi);


	        if ($insert) {
		        foreach ($size as $key => $value) {
			        $prices = $price[$key];
			        $fotos = $foto[$key];
			        $fototmp = $lokasi[$key];
			        $targetPath = "../foto_produk/" . $fotos;
			        //$sql2 = "INSERT INTO prop_produk (size,price,kd_produk) VALUES ('" . $koneksi->real_escape_string($value) . "','" . $koneksi->real_escape_string($prices) . "','" . $newOrderId . "')";
        			//$insert = $koneksi->query($sql2);
        
			        if (move_uploaded_file($fototmp, $targetPath)) {
				        $sql3 = "INSERT INTO prop_produk (size,price,foto,kd_produk) VALUES ('" . $koneksi->real_escape_string($value) . "','" . $koneksi->real_escape_string($prices) . "','" . $fotos . "','" . $newOrderId . "')";
				        $insert = $koneksi->query($sql3);
			        }

		        }


	        }


	        echo "<script>alert('Produk Berhasil di Tambah');
				document.location = '?halaman=produk';</script>";
        }
        ?>
	</div>
</body>