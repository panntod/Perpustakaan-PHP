<?php 
    if($_GET['id_buku']){
        include "../connect.php";
        $qry_hapus=mysqli_query($conn,"DELETE FROM buku WHERE id_buku='".$_GET['id_buku']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus buku');location.href='../frontend/buku.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus buku');</script>";
        }
    }
