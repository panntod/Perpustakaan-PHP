<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if all required fields are present
    $required_fields = ['id_siswa', 'nama_siswa', 'tanggal_lahir', 'alamat', 'gender', 'username', 'id_kelas'];
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $message = ucfirst(str_replace('_', ' ', $field)) . ' tidak boleh kosong';
            echo "<script>alert('$message');location.href='ubah_siswa.php';</script>";
            exit;
        }
    }

    // Sanitize and retrieve values
    $id_siswa = $_POST['id_siswa'];
    $nama_siswa = $_POST['nama_siswa'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $id_kelas = $_POST['id_kelas'];

    // Connect to database
    require_once "../connect.php";

    // Sanitize user input to prevent SQL injection
    $id_siswa = mysqli_real_escape_string($conn, $id_siswa);
    $nama_siswa = mysqli_real_escape_string($conn, $nama_siswa);
    $tanggal_lahir = mysqli_real_escape_string($conn, $tanggal_lahir);
    $alamat = mysqli_real_escape_string($conn, $alamat);
    $gender = mysqli_real_escape_string($conn, $gender);
    $username = mysqli_real_escape_string($conn, $username);
    $id_kelas = mysqli_real_escape_string($conn, $id_kelas);

    // Update password if provided
    if (!empty($password)) {
        $password = mysqli_real_escape_string($conn, md5($password));
        $update_query = "UPDATE siswa SET nama_siswa = '$nama_siswa', tanggal_lahir = '$tanggal_lahir', gender = '$gender', alamat = '$alamat', username = '$username', password = '$password', id_kelas = '$id_kelas' WHERE id_siswa = '$id_siswa'";
    } else {
        $update_query = "UPDATE siswa SET nama_siswa = '$nama_siswa', tanggal_lahir = '$tanggal_lahir', gender = '$gender', alamat = '$alamat', username = '$username', id_kelas = '$id_kelas' WHERE id_siswa = '$id_siswa'";
    }

    // Perform the update query
    $update_result = mysqli_query($conn, $update_query);

    // Check if update was successful
    if ($update_result) {
        echo "<script>alert('Sukses update siswa');location.href='../frontend/tampil_siswa.php';</script>";
    } else {
        echo "<script>alert('Gagal update siswa');</script>";
    }

    // Close database connection
    mysqli_close($conn);
}