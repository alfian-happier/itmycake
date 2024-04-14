<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu</title>
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
                <li class="breadcrumb-item active" aria-current="page">Menu</li>
            </ol>
        </div>
    </section>

    <!-- Cakes/Produk -->
    <section class="produk">
        <div class="container">
            <div class="row">
            </div>
            <div class="row">
                <?php
                $data = mysqli_query($koneksi, "SELECT * FROM category");
                $cek = mysqli_num_rows($data);
                if ($cek > 0) {
                    while ($category = mysqli_fetch_array($data)) {
                ?>

                <div class="col-md-3 col-6">
                    <div class="card">
                        <a href="sub-menu?nama=<?php echo $category['nama_category']; ?>"><img
                                src="foto_category/<?php echo $category['foto_category']; ?>" class="card-img-top"></a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $category['nama_category']; ?>
                            </h5>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php } else { ?>
                <div class="col-md-12">
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