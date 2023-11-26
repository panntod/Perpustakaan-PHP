<?php
include "header.php";
include "connect.php";
$qry_detail_buku = mysqli_query($conn, "select * from buku where id_buku = '" . $_GET['id_buku'] . "'");
$dt_buku = mysqli_fetch_array($qry_detail_buku);

$blobData = $dt_buku["foto"];
$blobUrl = 'data:image/jpeg;base64,' . base64_encode($blobData);
?>
<div class="container" style="min-height: 100vh; padding-top: 5rem;">
    <h2 class="text-center pb-3">Pinjam Buku</h2>
    <div class="row justify-content-evenly">
        <div class="col-lg-4 col-12">
            <img src="<?= $blobUrl ?>" class="card-img-top rounded shadow" style="height: 240px">
        </div>
        <div class="col-lg-7 col-12">
            <form action="masukan_keranjang.php?id_buku=<?= $dt_buku['id_buku'] ?>" method="post">
                <table class="table table-hover table-striped border shadow">
                    <thead>
                        <tr>
                            <td>Nama Buku</td>
                            <td>
                                <?= $dt_buku['nama_buku'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>
                                <?= $dt_buku['deskripsi'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Jumlah Pinjam</td>
                            <td><input type="number" name="jumlah_pinjam" value="1" class="border-0"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input class="btn btn-success w-50" type="submit" style="margin-left: 20%;"
                                    value="PINJAM"></td>
                        </tr>
                    </thead>
                </table>
            </form>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>