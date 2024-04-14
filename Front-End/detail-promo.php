<?php
session_start();
include 'koneksi.php';
$id_promo = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM promo WHERE kd_promo = '$id_promo'");
$promo = $ambil->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Details Promo</title>
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
                <li class="breadcrumb-item"><a href="promo">Promo</a></li>
                <li class="breadcrumb-item active" aria-current="page">Promo Detail</li>
            </ol>
        </div>
    </section>

    <!-- Detail-Promo -->
    <section class="detail-promo">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-12">
                    <div class="feat">
                        <img src="foto_promo/<?php echo $promo['foto_promo']; ?>"></a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-12 promo-detail">
                    <p class="promo-judul" id="txt-judul">
                        <?php echo $promo['judul_promo']; ?>
                    </p>
                    <p class="promo-deskripsi">
                        <?php echo nl2br($promo['deskripsi_promo']); ?>
                    </p>
                    <h5>Syarat dan Ketentuan</h5>
                    <p class="promo-deskripsi">
                        <?php echo '<ul class="promo-deskripsi"><li>' . implode('</li><li>', explode("\n", $promo['syarat_promo'])) . '</li></ul>'; ?>
                    </p>
                </div>
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