<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us</title>
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

    <!-- Contact -->
    <section class="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 kontakgambar">
                    <img src="images/contactus.png" width="100%">
                </div>
                <div class="col-lg-6">
                    <div class="contact-box ml-3">
                        <h1 class="mt-5">Quick Contact</h1>
                        <form class="mt-4">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group mt-2">
                                        <input class="form-control" type="text" name="nama" placeholder="Full Name"
                                            Required>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group mt-2">
                                        <input class="form-control" type="email" name="email"
                                            placeholder="Email Address" Required>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group mt-2">
                                        <input class="form-control" type="text" name="phone" placeholder="Phone"
                                            Required>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group mt-2">
                                        <textarea class="form-control" rows="3" name="pesan" placeholder="Message"
                                            Required></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <button name="submit" class="btn btn-success" id="button-contact">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <?php
                if (!empty($_POST['submit'])) {
                    $nama = $_POST['nama'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $pesan = $_POST['pesan'];
                    $toEmail = "imycakecyber@gmail.com";

                    $mailHeaders = "Name &nbsp : " . $nama .
                        "\r\n Email :" . $email .
                        "\r\n Phone :" . $phone .
                        "\r\n Message :" . $pesan . "\r\n";

                    if (mail($toEmail, $nama, $mailHeaders)) {
                        $pesan = "Your message has been sent.";
                    }
                }
                ?>

                <div class="col-lg-12 col-12">
                    <div class="mt-5 border-0 mb-4">
                        <div class="row kontakicon">
                            <div class="col-lg-4 col-md-6">
                                <div class="card-body d-flex align-items-center c-detail pl-0">
                                    <div class="align-self-center mb-3">
                                        <img src="images/icons/location.png" width="60">
                                    </div>
                                    <div class="card-contact ms-3">
                                        <h6 class="font">Address</h6>
                                        <p class="">Jl. BRI NO. 12
                                            <br> Cipete Selatan, Jakarta Selatan
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-5">
                                <div class="card-body d-flex align-items-center c-detail">
                                    <div class="align-self-center mb-3">
                                        <img src="images/icons/phone-call.png" width="60">
                                    </div>
                                    <div class="card-contact ms-3">
                                        <h6 class="font-weight-medium">Phone</h6>
                                        <p class="card-contact"> 0878 8779 1863
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-11">
                                <div class="card-body d-flex align-items-center c-detail">
                                    <div class="align-self-center mb-3">
                                        <img src="images/icons/email.png" width="65">
                                    </div>
                                    <div class="card-contact ms-3">
                                        <h6 class="font-weight-medium">Email</h6>
                                        <p class="">
                                            itsmycake@gmail.com
                                            <br> delivery_itsmycake@gmail.com
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
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

</body>

</html>