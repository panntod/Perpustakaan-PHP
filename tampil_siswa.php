<!DOCTYPE html>
<html>

<head>
    <link
        href="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Perpustakaan_Nasional_Republik_Indonesia_insignia.svg/1200px-Perpustakaan_Nasional_Republik_Indonesia_insignia.svg.png"
        rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Tampil Siswa</title>
</head>

<body class="container">
    <div style="padding: 20px; display: flex; justify-content: space-between;">
        <h3>Tampil Siswa</h3>
        <div style="display: flex; gap: 10px;">
            <a href="tambah_siswa.php" class="btn btn-secondary">Daftar</a>
            <a href="login.php" class="btn btn-success">Login</a>
        </div>
    </div>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA SISWA</th>
                <th>TANGGAL LAHIR</th>
                <th>ALAMAT</th>
                <th>GENDER</th>
                <th>USERNAME</th>
                <th>KELAS</th>
                <th>ROLE</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "connect.php";
            $qry_siswa = mysqli_query($conn, "select * from siswa join kelas on kelas.id_kelas=siswa.id_kelas");
            $no = 0;
            while ($data_siswa = mysqli_fetch_array($qry_siswa)) {
                $no++; ?>
                <tr>
                    <td>
                        <?= $no ?>
                    </td>
                    <td>
                        <?= $data_siswa['nama_siswa'] ?>
                    </td>
                    <td>
                        <?= $data_siswa['tanggal_lahir'] ?>
                    </td>
                    <td>
                        <?= $data_siswa['alamat'] ?>
                    </td>
                    <td>
                        <?= $data_siswa['gender'] ?>
                    </td>
                    <td>
                        <?= $data_siswa['username'] ?>
                    </td>
                    <td>
                        <?= $data_siswa['nama_kelas'] ?>
                    </td>
                    <td>
                        <?= $data_siswa['role'] ?>
                    </td>
                    <td>
                        <a href="ubah_siswa.php?id_siswa=<?= $data_siswa['id_siswa'] ?>"
                            class="btn btn-warning text-white"><i class="bi bi-pencil-square"></i></a>
                        <a href="hapus.php?id_siswa=<?= $data_siswa['id_siswa'] ?>"
                            onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger"><i
                                class="bi bi-trash"></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <a href="tambah_kelas.php" class="btn btn-primary">Tambah Kelas</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>