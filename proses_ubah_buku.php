<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_buku']; // Get the ID of the foto to update

    // Get the new name and price
    $nama_buku = $_POST['nama_buku'];
    $deskripsi = $_POST['deskripsi'];

    // Initialize the new foto data
    $newFoto = null;

    // Check if a new foto file was uploaded
    if (isset($_FILES['foto']) && $_FILES['foto']['size'] > 0) {
        $newFoto = file_get_contents($_FILES['foto']['tmp_name']);
    }

    // Prepare the SQL statement to update the foto data
    $sql = "UPDATE buku SET nama_buku = ?, deskripsi = ?";
    $bindTypes = "ss";
    $bindValues = [$nama_buku, $deskripsi];    

    // If a new foto is provided, update the foto data as well
    if ($newFoto !== null) {
        $sql .= ", foto = ?";
        $bindTypes .= "s";
        $bindValues[] = $newFoto;
    }

    $sql .= " WHERE id_buku = ?";
    $bindTypes .= "i";
    $bindValues[] = $id;

    // Update the foto data in the database
    $stmt = $conn->prepare($sql);
    $stmt->bind_param($bindTypes, ...$bindValues);

    if ($stmt->execute()) {
        echo "<script>alert('Buku Updated Successfully');location.href='buku.php';</script>";
    } else {
        echo 'Error: ' . $stmt->error;
    }
}
?>
