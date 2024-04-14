<?php
session_start();
include 'koneksi.php';

$nama_category = $_GET['nama'];

$ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_category='$nama_category'");
$cek = mysqli_fetch_assoc($ambil);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menus</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">

</head>

<body>
    <!-- Navbar -->
    <?php include 'menu/header.php' ?>

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">Home</a></li>
                <li class="breadcrumb-item"><a href="menus">Category</a></li>
                <li class="breadcrumb-item active">
                    <?php
                    if (isset($cek) ? count($cek) : 0) {
                        echo $cek['nama_category'];
                    }
                    ?>
                </li>
            </ol>
        </div>
    </section>

    <!-- Detail Menu -->
    <section class=" detail-category">
        <div class="container">
            <div class="row">
                <?php
                if (isset($_GET['cari'])) {
                    $cari = $_GET['cari'];
                    $data = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_produk like '%" . $cari . "%'");
                } else {
                    $data = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_category='$nama_category'");
                }
                $cek = mysqli_num_rows($data);
                if ($cek > 0) {
                    while ($produk = mysqli_fetch_array($data)) {
                ?>
                <div class="col-md-3 col-6">
                    <div class="card">
                        <a href="detail-produk?id=<?php echo $produk['kd_produk']; ?>"><img
                                src="foto_produk/<?php echo $produk['foto_produk']; ?>" class="card-img-top"></a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $produk['nama_produk']; ?>
                            </h5>
                            <p class="card-text">Rp.
                                <?php echo number_format($produk['harga_produk']); ?>
                            </p>

                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php } else { ?>
                <div class="col-lg-12">
                    <h4 class="text-center">"Produk Tidak Ditemukan"</h4>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'menu/footer.php' ?>

    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

</body>

</html>