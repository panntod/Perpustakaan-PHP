<?php 
    if($_GET['id_siswa']){
        include "connect.php";
        $qry_hapus=mysqli_query($conn,"delete from siswa where id_siswa='".$_GET['id_siswa']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus siswa');location.href='tampil_siswa.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus siswa');location.href='tampil_siswa.php';</script>";
        }
    }
?>
