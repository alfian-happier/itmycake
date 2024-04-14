<?php
include '../koneksi.php';
session_start();

if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Harap Masuk Terlebih Dahulu');
  document.location='masuk'</script>;";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Its My Cake</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- BOOTSTRAP STYLES-->
    <!-- <link href="assets/css/bootstrap.css" rel="stylesheet" /> -->
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <!-- <link href="assets/admin-style.css" rel="stylesheet" /> -->
    <link href="assets/dashboard.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- DATA TABLES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

</head>

<body class="bg-light">
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="?halaman=beranda"><span
                style="font-size: 24px; font-weight:500;">It's My
                Cake</span></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="akun">
            <img src="images/profile.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong><?php echo $_SESSION['nama_admin']; ?></strong>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="?halaman=beranda">
                                <i class="fa fa-house"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?halaman=category">
                                <i class="fa fa-cube"></i>Menu
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?halaman=produk">
                                <i class="fa fa-cake-candles"></i>Produk
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?halaman=outlet">
                                <i class="fa fa-store"></i>
                                Outlet
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?halaman=slider">
                                <i class="fa fa-images"></i>
                                Slider
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?halaman=promo">
                                <i class="fa fa-tags"></i>
                                Promo
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="?halaman=pelanggan">
                                <span data-feather="layers" class="align-text-bottom"></span>
                                Pelanggan
                            </a>
                        </li> -->
                    </ul>

                    <!-- <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                        <span>Saved reports</span>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Pemesanan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Laporan
                            </a>
                        </li>
                    </ul> -->
                    <ul class="nav flex-column mb-2 border-top">
                        <li class="nav-item">
                            <a class="nav-link" href="?halaman=keluar">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Keluar
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                </div>
                <?php include 'konfigurasi.php'; ?>
            </main>
        </div>
    </div>


    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->

    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- JQUERY SCRIPTS -->
    <!-- <script src="assets/js/jquery-1.10.2.js"></script> -->
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
    <!-- DATA TABLE SCRIPTS -->
    <!-- <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script> -->
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>

    <script>
        const activePage = window.location.search;
        const navLinks = document.querySelectorAll('.nav a').forEach(link => {
            if (link.href.includes(`${activePage}`)) {
                link.classList.add('active');
            }
        })
    </script>

    <!-- CUSTOM SCRIPTS -->
    <!-- <script src="assets/js/custom.js"></script> -->

    <script type="text/javascript">

        $("#rowAdder").click(function () {
            newRowAdd =
                '<div id="row" style="margin-bottom: 1%;"> <div class="input-group-prepend" style="display: flex;">' +
                '<button class="btn btn-danger" id="DeleteRow" type="button" style="margin-right: 10px;">' +
                '<i class="fa-solid fa-trash"></i> Delete</button>' +
                '<input type="text" name="size[]" class="form-control m-input" maxlength="40" required="" placeholder = "Masukkan Size" style = "width: 10%;" > ' +
                '<input type="text" name="price[]" class="form-control m-input" maxlength="40" required="" placeholder = "Masukkan Harga" style = "margin-left: 10px; width: 20%;" > ' +
                '<input type="file" name="foto[]" class="form-control m-input" required="" style = "margin-left: 10px; width: 20%;" > </div></div> ';
            $('#newinput').append(newRowAdd);
        });

        $("body").on("click", "#DeleteRow", function () {
            $(this).parents("#row").remove();
        })
    </script>

</body>

</html>