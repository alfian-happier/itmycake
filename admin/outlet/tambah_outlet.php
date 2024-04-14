<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<h2 class="">Tambah Outlet</h2>
		</div>
	</div>
	<hr />
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-group mb-3">
			<label for="" class="form-label">Nama Outlet</label>
			<input type="text" name="nama_outlet" class="form-control" maxlength="30" required="">
		</div>
		<div class="form-group mb-3">
			<label for="" class="form-label">Alamat Outlet</label>
			<textarea class="form-control" name="alamat_outlet" style="resize: none;" rows="6"></textarea>
		</div>
		<div class="form-group mb-3">
			<label for="" class="form-label">Foto Outlet</label>
			<input type="file" name="foto_outlet" class="form-control" required="">
		</div>
		<div class="form-group mb-3">
			<label for="" class="form-label">Time Outlet</label>
			<select name="time_outlet" class="form-control" id="">
				<option value="08.00 AM - 09.00 PM">08.00 AM - 09.00 PM</option>
			</select>
		</div>
		<div class="form-group mb-3">
			<label for="" class="form-label">No. Telpon</label>
			<input type="text" name="no_telpon" class="form-control" maxlength="13" required="">
		</div>
		<div class="form-group mb-3">
			<label for="" class="form-label">Location</label>
			<input type="text" name="location_outlet" class="form-control" required="">
		</div>
		<div class="form-group mb-3">
			<label for="" class="form-label">Go Food</label>
			<input type="text" name="go_food" class="form-control" required="">
		</div>
		<div class="form-group mb-3">
			<label for="" class="form-label">Grab Food</label>
			<input type="text" name="grab_food" class="form-control" required="">
		</div>
		<button name="tambah" class="btn btn-success" id="btnDefault" style="width: 100%; padding: 12px 0;">Tambah
			Outlet</button>
	</form>
	<?php
    if (isset($_POST['tambah'])) {
	    $nama_outlet = $_POST['nama_outlet'];
	    $alamat_outlet = $_POST['alamat_outlet'];
	    $foto_outlet = $_FILES['foto_outlet']['name'];
	    $lokasi = $_FILES['foto_outlet']['tmp_name'];
	    move_uploaded_file($lokasi, "../foto_outlet/" . $foto_outlet);
	    $time_outlet = $_POST['time_outlet'];
	    $no_telpon = $_POST['no_telpon'];
	    $location_outlet = $_POST['location_outlet'];
	    $go_food = $_POST['go_food'];
	    $grab_food = $_POST['grab_food'];


	    $koneksi->query(
	    	"INSERT INTO outlet (nama_outlet, alamat_outlet, foto_outlet, time_outlet, no_telpon, location_outlet, go_food, grab_food) VALUES 
			('$nama_outlet','$alamat_outlet','$foto_outlet','$time_outlet','$no_telpon','$location_outlet','$go_food','$grab_food')"
	    );

	    echo "<script>alert('Outlet Berhasil di Tambah');
		document.location='?halaman=outlet';</script>";
    }
    ?>
</div>