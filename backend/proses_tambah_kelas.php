<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama_kelas = isset($_POST['nama_kelas']) ? $_POST['nama_kelas'] : '';
    $kelompok = isset($_POST['kelompok']) ? $_POST['kelompok'] : '';

    function redirect($message)
    {
        echo "<script>alert('$message');location.href='../frontend/tambah_kelas.php';</script>";
        exit;
    }

    if (empty($nama_kelas)) {
        redirect('Nama kelas tidak boleh kosong');
    } elseif (empty($kelompok)) {
        redirect('Kelompok tidak boleh kosong');
    } else {
        require_once "../connect.php";

        $nama_kelas = mysqli_real_escape_string($conn, $nama_kelas);
        $kelompok = mysqli_real_escape_string($conn, $kelompok);

        $query = "INSERT INTO kelas (nama_kelas, kelompok) VALUES ('$nama_kelas', '$kelompok')";
        $insert = mysqli_query($conn, $query);

        if ($insert) {
            redirect('Sukses menambahkan kelas');
        } else {
            redirect('Gagal menambahkan kelas');
        }
    }
}