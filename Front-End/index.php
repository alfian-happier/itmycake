<?php
session_start();

include 'koneksi.php';


$query = "SELECT id_slider, judul, deskripsi, foto_slider FROM carousel ORDER BY id_slider ASC";
$result = $koneksi->query($query);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Its My cake</title>
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

    <!-- Slider -->
    <section class="carousel">
        <div class="container-lg">
            <div id="carouselIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    <?php
                    for ($i = 0; $i < $result->num_rows; $i++) {
                        echo '<li data-bs-target="#carouselIndicators" data-bs-slide-to="' . $i . '"';
                        if ($i == 0) {
                            echo 'class="active"';
                        }
                        echo '></li>';
                    } ?>
                </div>
                <div class="carousel-inner">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if ($row['id_slider'] == 1) {
                                echo '<div class="carousel-item active">';
                            } else {
                                echo '<div class="carousel-item">';
                            }
                            echo '<img class="d-block" src="foto_slider/' . $row['foto_slider'] . '" alt="' . $row['judul'] . '"></div>';
                        }
                    } ?>
                </div>
                <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselIndicators" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Cakes -->
    <section class="cakes">
        <div class="container">
            <h4 style="text-align: center;">All Product</h4>
            <div class="row">
                <?php
                $data = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY RAND() LIMIT 8");
                $cek = mysqli_num_rows($data);
                if ($cek) {
                    while ($produk = mysqli_fetch_array($data)) {
                ?>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="card">
                        <a href="detail-produk?id=<?php echo $produk['kd_produk']; ?>"><img
                                src="foto_produk/<?php echo $produk['foto_produk']; ?>" class="card-img-top"></a>
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 16px;">
                                <?php echo $produk['nama_produk']; ?>
                            </h5>
                            <p class="card-text">Rp.
                                <?php echo number_format($produk['harga_produk']); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php } ?>
            </div>
            <div class="text-center mt-4">
                <a href="menus"><button name="see_more" class="btn btn-primary" id="button-see-more">See
                        More</button></a>
            </div>
        </div>
    </section>

    <!-- About -->
    <section class="about" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="about-thumbnail">
                        <div class="about-image" style="
                    background-image: url('images/about2.png');
                    "></div>
                    </div>
                </div>
                <div class="col">
                    <div class="about-text">
                        <h4>About<br>It's My Cake</h4>
                        Its my cake make a great gift for any occasion, we are a specialist in cake delivery with the
                        excellent
                        taste, that please you, your customer, sweetheart, happy family, best friend and office group.
                    </div>
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

    <!-- Script Interval Slider -->
    <script>
        const myCarouselElement = document.querySelector('#carouselIndicators')
        const carousel = new bootstrap.Carousel(myCarouselElement, {
            //1000 = 1 detik
            interval: 3000,
        })

    </script>

</body>

</html>