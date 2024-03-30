<?php
include "header.php";
?>
<style>
    .background-section {
        background: url('../img/library.avif') no-repeat center center fixed;
        background-size: cover;
        text-align: center;
        height: 100vh;
        color: #fff;
    }

    .description {
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    h1 {
        font-size: 3rem;
        font-weight: 700;
    }

    p {
        font-weight: 300;
    }

    .h-card {
        height: 20rem;
    }

    @media screen and (max-width:567px) {
        h1 {
            font-size: 2rem;
            font-weight: 500;
        }
    }
</style>
<!-- landing page -->
<section class="background-section">
    <div class="container-fluid">
        <div class="description">
            <h1>Selamat datang
                <?= $_SESSION['nama_siswa'] ?> di website Perpus Online.
            </h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt, rerum sint? Modi, delectus. Maiores
                tempora rerum quas in minima, esse nisi, expedita voluptatem odit quaerat recusandae quasi eligendi
                tempore
                illum temporibus repellendus dolore! Ducimus, quam odio assumenda aperiam praesentium facere.</p>
        </div>
    </div>
</section>

<!-- card -->
<section class="container-fluid mt-5 mb-5">
    <div class="row g-4">

        <div class="row g-4">
            <!-- Card Bootstrap -->
            <div class="col-lg-4 col-12">
                <div class="card h-card">
                    <!-- Ikon menggunakan Bootstrap Icons -->
                    <div class="card-body text-center mt-5">
                        <i class="bi bi-book-half" style="font-size: 2em; color: blue;"></i>
                        <h5 class="card-title mt-4">Pinjam Buku</h5>
                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum, temporibus!
                        </p>
                        <!-- Tautan ke halaman profil -->

                        <a href="buku.php" class="btn btn-primary w-100 mt-3">PINJAM
                            <i class="bi bi-journal-plus"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card Bootstrap -->
            <div class="col-lg-4 col-12">
                <div class="card h-card">
                    <!-- Ikon menggunakan Bootstrap Icons -->
                    <div class="card-body text-center mt-5">
                        <i class="bi bi-basket-fill" style="font-size: 2em; color: blue;"></i>
                        <h5 class="card-title mt-4">Keranjang</h5>
                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum, temporibus!
                        </p>
                        <!-- Tautan ke halaman profil -->

                        <a href="buku.php" class="btn btn-primary w-100 mt-3">LIHAT
                            <i class="bi bi-arrow-up-right-square"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card Bootstrap -->
            <div class="col-lg-4 col-12">
                <div class="card h-card">
                    <!-- Ikon menggunakan Bootstrap Icons -->
                    <div class="card-body text-center mt-5">
                        <i class="bi bi-clipboard-fill" style="font-size: 2em; color: blue;"></i>
                        <h5 class="card-title mt-4">Transaksi</h5>
                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum, temporibus!
                        </p>
                        <!-- Tautan ke halaman profil -->

                        <a href="histori_peminjaman.php" class="btn btn-primary w-100 mt-3">LIHAT <i
                                class="bi bi-arrow-up-right-square"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<?php
include "footer.php";
?>