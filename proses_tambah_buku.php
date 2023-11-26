<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $nama_buku = $_POST['nama_buku'];
        $deskripsi = $_POST['deskripsi'];

        // Check if a foto file was uploaded
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $imageData = file_get_contents($_FILES['foto']['tmp_name']);

            // Check if the name already exists in the database
            $sql = "SELECT COUNT(*) FROM buku WHERE nama_buku = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $nama_buku);
            $stmt->execute();
            $stmt->bind_result($nameCount);
            $stmt->fetch();
            $stmt->close();

            if ($nameCount > 0) {
                echo "<script>alert('Error: Foto sudah ada di database.');location.href='tambah_buku.php';</script>";
            } else {
                // Insert data into the "foto" table
                $sql = "INSERT INTO buku (nama_buku, deskripsi, foto) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('sss', $nama_buku, $deskripsi, $imageData);

                if ($stmt->execute()) {
                    echo "<script>alert('Buku Sukses Diupload');location.href='buku.php';</script>";
                } else {
                    echo 'Error: ' . $stmt->error;
                }

                $stmt->close();
            }
        } else {
            echo 'Error: Please select a foto file.';
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
