<?php
if($_GET['id']) {
    require_once "../connect.php";

    $id_peminjaman_buku = $_GET['id'];
    $cek_terlambat = mysqli_query($conn, "SELECT * FROM peminjaman_buku WHERE id_peminjaman_buku = '$id_peminjaman_buku'");
    
    if($cek_terlambat) {
        $dt_pinjam = mysqli_fetch_array($cek_terlambat);

        $tanggal_kembali = new DateTime($dt_pinjam['tanggal_kembali']);
        $today = new DateTime();

        if($tanggal_kembali >= $today) {
            $denda = 0;
        } else {
            $harga_denda_perhari = 5000;
            $selisih_hari = $today->diff($tanggal_kembali)->days;
            $denda = $selisih_hari * $harga_denda_perhari;
        }

        $tanggal_pengembalian = date('Y-m-d');
        $query_insert = "INSERT INTO pengembalian_buku (id_peminjaman_buku, tanggal_pengembalian, denda) VALUES ('$id_peminjaman_buku', '$tanggal_pengembalian', '$denda')";
        $insert_result = mysqli_query($conn, $query_insert);

        if($insert_result) {
            header('location: ../frontend/histori_peminjaman.php');
            exit(); // Ensure no code execution after redirection
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn); // Close database connection
}