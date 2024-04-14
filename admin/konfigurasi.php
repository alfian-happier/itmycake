<?php
if (isset($_GET['halaman'])) {
    if ($_GET['halaman'] == "beranda") {
        include 'beranda.php';
    } elseif ($_GET['halaman'] == "promo") {
        include 'promo/promo.php';
    } elseif ($_GET['halaman'] == "tambah_promo") {
        include 'promo/tambah_promo.php';
    } elseif ($_GET['halaman'] == "ubah_promo") {
        include 'promo/ubah_promo.php';
    } elseif ($_GET['halaman'] == "hapus_promo") {
        include 'promo/hapus_promo.php';
    } elseif ($_GET['halaman'] == "category") {
        include 'category/category.php';
    } elseif ($_GET['halaman'] == "tambah_category") {
        include 'category/tambah_category.php';
    } elseif ($_GET['halaman'] == "ubah_category") {
        include 'category/ubah_category.php';
    } elseif ($_GET['halaman'] == "hapus_category") {
        include 'category/hapus_category.php';
    } elseif ($_GET['halaman'] == "produk") {
        include 'produk/produk.php';
    } elseif ($_GET['halaman'] == "tambah_produk") {
        include 'produk/tambah_produk.php';
    } elseif ($_GET['halaman'] == "ubah_produk") {
        include 'produk/ubah_produk.php';
    } elseif ($_GET['halaman'] == "hapus_produk") {
        include 'produk/hapus_produk.php';
    } elseif ($_GET['halaman'] == "outlet") {
        include 'outlet/outlet.php';
    } elseif ($_GET['halaman'] == "tambah_outlet") {
        include 'outlet/tambah_outlet.php';
    } elseif ($_GET['halaman'] == "ubah_outlet") {
        include 'outlet/ubah_outlet.php';
    } elseif ($_GET['halaman'] == "hapus_outlet") {
        include 'outlet/hapus_outlet.php';
    } elseif ($_GET['halaman'] == "slider") {
        include 'slider/slider.php';
    } elseif ($_GET['halaman'] == "tambah_slider") {
        include 'slider/tambah_slider.php';
    } elseif ($_GET['halaman'] == "ubah_slider") {
        include 'slider/ubah_slider.php';
    } elseif ($_GET['halaman'] == "hapus_slider") {
        include 'slider/hapus_slider.php';
    } elseif ($_GET['halaman'] == "kategori") {
        include 'kategori.php';
    } elseif ($_GET['halaman'] == "tambah_kategori") {
        include 'kategori/tambah.php';
    } elseif ($_GET['halaman'] == "ubah_kategori") {
        include 'kategori/ubah.php';
    } elseif ($_GET['halaman'] == "hapus_kategori") {
        include 'kategori/hapus.php';
    } elseif ($_GET['halaman'] == "pemesanan") {
        include 'pemesanan/pemesanan.php';
    } elseif ($_GET['halaman'] == "detail_pemesanan") {
        include 'pemesanan/detail_pemesanan.php';
    } elseif ($_GET['halaman'] == "laporan_penjualan") {
        include 'laporan/laporan.php';
    } elseif ($_GET['halaman'] == "cetak") {
        include 'laporan/cetak.php';
    } elseif ($_GET['halaman'] == "pelanggan") {
        include 'pelanggan/pelanggan.php';
    } elseif ($_GET['halaman'] == "hapus_pelanggan") {
        include 'pelanggan/hapus_pelanggan.php';
    } elseif ($_GET['halaman'] == "pembayaran") {
        include 'pemesanan/pembayaran.php';
    } elseif ($_GET['halaman'] == "hapus_pemesanan") {
        include 'pemesanan/hapus.php';
    } elseif ($_GET['halaman'] == "saran") {
        include 'saran/saran.php';
    } elseif ($_GET['halaman'] == "hapus") {
        include 'saran/hapus.php';
    } elseif ($_GET['halaman'] == "detail_saran") {
        include 'saran/detail_saran.php';
    } elseif ($_GET['halaman'] == "keluar") {
        include 'keluar.php';
    }
} else {
    include 'beranda.php';
}
?>