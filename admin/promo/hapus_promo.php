<?php
$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM promo WHERE kd_promo = '$id'");
$data = $ambil->fetch_assoc();
$foto = $data['foto_promo'];
if (file_exists("../foto_promo/$foto")) {
	unlink("../foto_promo/$foto");
}

$koneksi->query("DELETE FROM promo WHERE kd_promo = '$id'");
echo "<script>alert('Data Promo Berhasil di Hapus');
	document.location='?halaman=promo'</script>;";

?>