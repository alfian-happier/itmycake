<?php
$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM carousel WHERE id_slider = '$id'");
$data = $ambil->fetch_assoc();
$foto_slider = $data['foto_slider'];
if (file_exists("../foto_slider/$foto_slider")) {
	unlink("../foto_slider/$foto_slider");
}

$koneksi->query("DELETE FROM carousel WHERE id_slider = '$id'");
echo "<script>alert('Data Slider Berhasil di Hapus');
	document.location='?halaman=slider'</script>;";

?>