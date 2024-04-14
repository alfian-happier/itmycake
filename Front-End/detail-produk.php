<?php
session_start();
include 'koneksi.php';
$id_produk = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM produk WHERE kd_produk = '$id_produk'");
$produk = $ambil->fetch_assoc();

$sql = "SELECT * FROM prop_produk WHERE kd_produk = '$id_produk'";
$prop_produk = mysqli_query($koneksi, $sql);
$result = $prop_produk->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Details Product</title>
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
                <li class="breadcrumb-item"><a href="menus">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Produk</li>
            </ol>
        </div>
    </section>

    <!-- Detail Cake/Produk -->
    <section class="detail-produk">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-12" id="foto">
                    <div class="feat">
                        <span><img id="featured" src=" foto_produk/<?php echo $result['foto']; ?>"></img></span>
                        <div class="col-lg-12" style="display:flex; ">
                            <?php
                            $query = "SELECT * FROM prop_produk";
                            $do = mysqli_query($koneksi, $sql);
                            $cek = mysqli_num_rows($do);
                            if ($cek) {
                                while ($row = mysqli_fetch_array($do)) {
                            ?>
                            <img src="foto_produk/<?php echo $row['foto']; ?> " class="feat-sub"></img>
                            <?php } ?>
                            <?php } ?>
                        </div>
                    </div>

                </div>

                <div class="col-lg-7 col-md-12 col-12">
                    <p class="nama-produk">
                        <?php echo $produk['nama_produk']; ?>
                    </p>
                    <p class="harga-produk" id="price">
                        Rp. -</span>
                    </p>
                    <hr>
                    <p>Size &nbsp;&nbsp;:</p>
                    <select class="form-control" name="size" id="size">
                        <option value="">-- Select Size --</option>
                        <?php
                        $query = "SELECT * FROM prop_produk";
                        $do = mysqli_query($koneksi, $sql);
                        while ($row = mysqli_fetch_array($do)) {
                            echo '<option value = "' . $row['id_prop'] . '">' . $row['size'] . ' ' . '</option>';
                        }
                        ?>
                    </select>
                    <hr>
                    <h5 class="nama-produk">Description</h5>
                    <p class="deskripsi-detail">
                        <?php echo $produk['deskripsi_produk']; ?>
                    </p>
                    <hr>
                    <div class="col-md-12">
                        <p style="font-weight: bold; color: #D17792;">*Khusus untuk Custom atau
                            Pre-Order,
                            Silahkan hubungi Customer
                            Service kami</p>
                        <a href="how-to-order"><button class="btn btn-primary" id="button-toko">Order Now</button></a>
                        <a href="https://wa.me/087887791863" target="_blank"><button class="btn btn-primary"
                                id="button-toko">Customer Service</button></a>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $('.minus').click(function () {
                var $input = $(this).parent().find('input');
                var count = parseInt($input.val()) - 1;
                count = count < 1 ? 1 : count;
                $input.val(count);
                $input.change();
                return false;
            });
            $('.plus').click(function () {
                var $input = $(this).parent().find('input');
                $input.val(parseInt($input.val()) + 1);
                $input.change();
                return false;
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#size').on('change', function () {
                var sizeID = $(this).val();
                if (sizeID) {
                    $.get(
                        "ajax.php",
                        { size: sizeID },
                        function (data) {
                            $('#price').html(data);
                        }
                    );
                }
            })
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#size').on('change', function () {
                var sizeID = $(this).val();
                if (sizeID) {
                    $.get(
                        "ajax2.php",
                        { size: sizeID },
                        function (data) {
                            $('#foto').html(data);
                        }
                    );
                }
            })
        });
    </script>

    <script type="text/javascript">
        let featSubs = document.getElementsByClassName('feat-sub')
        let activeImages = document.getElementsByClassName('active')

        for (var i = 0; i < featSubs.length; i++) {

            featSubs[i].addEventListener('click', function () {
                console.log(activeImages)

                if (activeImages.length > 0) {
                    activeImages[0].classList.remove('active')
                }
                this.classList.add('active')
                document.getElementById('featured').src = this.src
            })
        }

    </script>

</body>

</html>