<!DOCTYPE html>
<html>

<head>
    <link
        href="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Perpustakaan_Nasional_Republik_Indonesia_insignia.svg/1200px-Perpustakaan_Nasional_Republik_Indonesia_insignia.svg.png"
        rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Tambah Buku</title>
</head>

<body class="container my-5">

    <?php
    include "../connect.php";
    $qry_get_buku = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku = '" . $_GET['id_buku'] . "'");
    $dt_buku = mysqli_fetch_array($qry_get_buku);
    ?>

    <h3 class="text-center">Tambah Buku</h3>
    <form action="../backend/proses_ubah_buku.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_buku" value="<?= $dt_buku['id_buku'] ?>">
        <div class="mb-3">
            <label for="nama_buku" class="form-label">Nama buku:</label>
            <input type="text" name="nama_buku" value="<?= $dt_buku['nama_buku'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi:</label>
            <input type="text" name="deskripsi" value="<?= $dt_buku['deskripsi'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto:</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <input type="submit" name="simpan" value="Ubah Buku" class="btn btn-primary">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>