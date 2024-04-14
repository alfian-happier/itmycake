<?php
$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM outlet WHERE id_outlet = '$id'");
$data = $ambil->fetch_assoc();
$foto_outlet = $data['foto_outlet'];
if (file_exists("../foto_outlet/$foto_outlet")) {
	unlink("../foto_outlet/$foto_outlet");
}

$koneksi->query("DELETE FROM outlet WHERE id_outlet = '$id'");
echo "<script>alert('Data Outlet Berhasil di Hapus');
	document.location='?halaman=outlet'</script>;";

?>