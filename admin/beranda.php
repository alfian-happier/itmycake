<div id="page-inners">
    <div class="row">
        <div class="col-md-12">
            <h2>Dashboard</h2>
        </div>
    </div>

    <div class="row" style="margin-top: 40px;">
        <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <div class="text-box">
                    <p class="text-muted">Menu</p>
                    <?php
                    $query = $koneksi->query("SELECT * FROM category");
                    $menu = mysqli_num_rows($query);
                    ?>
                    <p class="main-text">
                        <?php echo $menu; ?>
                    </p>

                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <div class="text-box">
                    <p class="text-muted">Produk</p>
                    <?php
                    $query = $koneksi->query("SELECT * FROM produk");
                    $produk = mysqli_num_rows($query);
                    ?>
                    <p class="main-text">
                        <?php echo $produk; ?>
                    </p>

                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <div class="text-box">
                    <p class="text-muted">Promo</p>
                    <?php
                    $query = $koneksi->query("SELECT * FROM promo");
                    $promo = mysqli_num_rows($query);
                    ?>
                    <p class="main-text">
                        <?php echo $promo; ?>
                    </p>

                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <div class="text-box">
                    <p class="text-muted">Slider</p>
                    <?php
                    $query = $koneksi->query("SELECT * FROM carousel");
                    $slider = mysqli_num_rows($query);
                    ?>
                    <p class="main-text">
                        <?php echo $slider; ?>
                    </p>

                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <div class="text-box">
                    <p class="text-muted">Outlet</p>
                    <?php
                    $query = $koneksi->query("SELECT * FROM outlet");
                    $outlet = mysqli_num_rows($query);
                    ?>
                    <p class="main-text">
                        <?php echo $outlet; ?>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>