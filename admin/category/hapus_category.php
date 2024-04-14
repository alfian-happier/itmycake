<?php
$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM category WHERE id_category = '$id'");
$data = $ambil->fetch_assoc();
$foto_category = $data['foto_category'];
if (file_exists("../foto_category/$foto_category")) {
	unlink("../foto_category/$foto_category");
}

$koneksi->query("DELETE FROM category WHERE id_category = '$id'");
echo "<script>alert('Data Category Berhasil di Hapus');
	document.location='?halaman=category'</script>;";

?>