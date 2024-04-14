<?php

if (isset($_GET['size']) && !empty($_GET['size'])) {

    include('koneksi.php');

    $id = $_GET['size'];

    $query = "SELECT * FROM prop_produk WHERE id_prop = '$id'";
    $do = mysqli_query($koneksi, $query);
    $count = mysqli_num_rows($do);

    if ($count > 0) {
        while ($row = mysqli_fetch_array($do)) {
            $gambar = $row['foto'];
            echo '<div value="' . $row['kd_produk'] . '" class="feat"><img src="foto_produk/' . $gambar . '" id="featured"></img></div>';
        }
    }
}


?>