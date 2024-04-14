<?php
$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM produk WHERE kd_produk = '$id'");
$ambil2 = $koneksi->query("SELECT * FROM prop_produk WHERE kd_produk = '$id'");
$data = $ambil->fetch_assoc();
$data2 = $ambil2->fetch_assoc();
$foto_produk = $data['foto_produk'];
if (file_exists("../foto_produk/$foto_produk")) {
	unlink("../foto_produk/$foto_produk");
}

$koneksi->query("DELETE FROM produk WHERE kd_produk = '$id'");
$koneksi->query("DELETE FROM prop_produk WHERE kd_produk = '$id'");
echo "<script>alert('Data Produk Berhasil di Hapus');
	document.location='?halaman=produk'</script>;";

?>