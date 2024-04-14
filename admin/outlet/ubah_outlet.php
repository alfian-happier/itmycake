<?php
$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM outlet WHERE id_outlet = '$id'");
$data = $ambil->fetch_assoc();
?>
<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<h2 class="">Ubah Outlet</h2>
		</div>
	</div>
	<hr />
	<form method="post" enctype="multipart/form-data">
		<div class="form-group mb-3">
			<label class="form-label">Nama Outlet</label>
			<input type="text" name="nama_outlet" class="form-control" maxlength="30" required=""
				value="<?php echo $data['nama_outlet']; ?>">
		</div>
		<div class="form-group mb-3">
			<label class="form-label">Alamat Outlet</label>
			<textarea class="form-control" name="alamat_outlet" style="resize: none;"
				rows="6"><?php echo $data['alamat_outlet']; ?></textarea>
		</div>
		<div class="form-group mb-3">
			<label class="form-label">Foto Outlet</label><br>
			<img src="../foto_outlet/<?php echo $data['foto_outlet']; ?>" width="200">
		</div>
		<div class="form-group mb-3">
			<label class="form-label">Ubah Foto outlet</label>
			<span style="font-size: 10px; font-weight: lighter; color: red;"> (Wajib di ganti walau foto yang
				sama)</span>
			<input type="file" name="foto_outlet" class="form-control">
		</div>
		<div class="form-group mb-3">
			<label class="form-label">Jam Operasional</label>
			<select name="time_outlet" class="form-control">
				<option value="<?php echo $data['time_outlet']; ?>">
					<?php echo $data['time_outlet']; ?>
				</option>
			</select>
		</div>
		<div class="form-group mb-3">
			<label class="form-label">No Telpon</label>
			<input type="text" name="no_telpon" class="form-control" maxlength="12" required=""
				value="<?php echo $data['no_telpon']; ?>">
		</div>
		<div class="form-group mb-3">
			<label class="form-label">Location</label>
			<input type="text" name="location_outlet" class="form-control" required=""
				value="<?php echo $data['location_outlet']; ?>">
		</div>
		<div class="form-group mb-3">
			<label class="form-label">Go Food</label>
			<input type="text" name="go_food" class="form-control" required="" value="<?php echo $data['go_food']; ?>">
		</div>
		<div class="form-group mb-3">
			<label class="form-label">Grab Food</label>
			<input type="text" name="grab_food" class="form-control" required=""
				value="<?php echo $data['grab_food']; ?>">
		</div>
		<button name="simpan" class="btn btn-success" id="btnDefault" style="width: 100%; padding: 12px 0;">Simpan
			Outlet</button>
	</form>
	<?php
    if (isset($_POST['simpan'])) {
	    $nama_outlet = $_POST['nama_outlet'];
	    $alamat_outlet = $_POST['alamat_outlet'];
	    $nama_foto_outlet = $_FILES['foto_outlet']['name'];
	    $lokasi = $_FILES['foto_outlet']['tmp_name'];
	    $time_outlet = $_POST['time_outlet'];
	    $no_telpon = $_POST['no_telpon'];
	    $location_outlet = $_POST['location_outlet'];
	    $go_food = $_POST['go_food'];
	    $grab_food = $_POST['grab_food'];

	    //Jika foto di rubah
    	if (!empty($lokasi)) {
		    move_uploaded_file($lokasi, "../foto_outlet/$nama_foto_outlet");

		    $koneksi->query("UPDATE outlet SET nama_outlet='$nama_outlet', alamat_outlet='$alamat_outlet', foto_outlet='$nama_foto_outlet', time_outlet='$time_outlet', no_telpon='$no_telpon', location_outlet='$location_outlet', go_food='$go_food', grab_food='$grab_food' WHERE id_outlet='$id'");
	    } else {
		    $koneksi->query("UPDATE outlet SET nama_outlet='$nama_outlet', alamat_outlet='$alamat_outlet', foto_outlet='$nama_foto_outlet', time_outlet='$time_outlet', no_telpon='$no_telpon', location_outlet='$location_outlet', go_food='$go_food', grab_food='$grab_food' WHERE id_outlet='$id'");
	    }

	    echo "<script>alert('Data Outlet Berhasil di Ubah');
		document.location='?halaman=outlet'</script>;";
    }
    ?>
</div>