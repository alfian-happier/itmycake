<?php
session_start();
include '../koneksi.php';
if (isset($_SESSION['admin'])) {
    header("location:index?halaman=beranda");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
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
    <link rel="stylesheet" href="assets/admin-style.css">

</head>

<body>
    <div class="container">
        <div class="card">
            <div class="gambar-logo text-center">
                <img src="images/logo-toko.png" alt="">
            </div>
            <div class="col">
                <form role="form" method="post" class="login">
                    <div class="usr mb-3">
                        <label for="InputUsername" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan Username">
                    </div>
                    <div class="pw mb3">
                        <label for="InputPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                    </div>
                    <button name="masuk" class="btn btn-success" id="btn-login">Masuk</button>
                </form>
                <?php
                if (isset($_POST['masuk'])) {

                    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
                    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

                    $ambil = "SELECT * FROM admin WHERE username = '$username' AND password = '" . md5($password) . "' ";
                    $rs = mysqli_query($koneksi, $ambil);
                    $cocok = mysqli_num_rows($rs);

                    if ($cocok == 1) {
                        $akun = mysqli_fetch_assoc($rs);

                        $_SESSION['admin'] = $akun;
                        $_SESSION['id_admin'] = $akun['id_admin'];
                        $_SESSION['nama_admin'] = $akun['nama_lengkap'];
                        $_SESSION['username'] = $akun['username'];
                        echo "<script>alert('Berhasil Masuk');
              document.location='index?halaman=beranda'</script>;";

                    } else {
                        echo "<script>alert('Maaf, Nama Pengguna atau Kata Sandi Salah!!!');
              document.location='masuk'</script>;";
                    }
                }
                ?>
            </div>
        </div>
    </div>


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