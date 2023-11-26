<?php
include "header.php";
?>

<div class="container" style="min-height: 100vh; padding-top: 5rem">
    <h2 class="text-center pb-3">Daftar Buku</h2>
    <div class="row g-5">
        <?php
        include "connect.php";
        $qry_buku = mysqli_query($conn, "select * from buku");
        while ($dt_buku = mysqli_fetch_array($qry_buku)) {
            // Ambil data blob dari hasil query
            $blobData = $dt_buku["foto"];

            // Buat URL blob
            $blobUrl = 'data:image/jpeg;base64,' . base64_encode($blobData);
            ?>
            <div class="col-md-3">
                <div class="card shadow">
                    <img src="<?= $blobUrl ?>" class="card-img-top" style="height: 200px">
                    <div class="card-body">
                        <h5 class="card-title text-center uppercase">
                            <?= $dt_buku['nama_buku'] ?>
                        </h5>
                        <p class="card-text text-center">
                            <?= $dt_buku['deskripsi'] ?>
                        </p>
                        <a href="pinjam_buku.php?id_buku=<?= $dt_buku['id_buku'] ?>"
                            class="btn btn-primary w-100">Pinjam</a>
                        <?php if ($_SESSION['role'] == 'admin'): ?>
                            <div class="d-flex mt-3">
                                <a href="ubah_buku.php?id_buku=<?= $dt_buku['id_buku'] ?>"
                                    class="btn btn-warning text-white w-50"><i class="bi bi-pencil-square"></i></a>
                                <a href="hapus_buku.php?id_buku=<?= $dt_buku['id_buku'] ?>" class="btn btn-danger w-50 ms-3"><i
                                        class="bi bi-trash"></i></a>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <a href="tambah_buku.php" class="my-4 btn btn-primary w-25 py-2">Tambah Buku</a>
</div>

<?php
include "footer.php";
?>