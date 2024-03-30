<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if all required fields are present
    $required_fields = ['nama_siswa', 'tanggal_lahir', 'alamat', 'gender', 'username', 'password', 'id_kelas'];
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $message = ucfirst(str_replace('_', ' ', $field)) . ' tidak boleh kosong';
            echo "<script>alert('$message');location.href='../frontend/tambah_siswa.php';</script>";
            exit;
        }
    }

    // Sanitize and retrieve values
    $nama_siswa = $_POST['nama_siswa'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id_kelas = $_POST['id_kelas'];

    // Connect to database
    require_once "../connect.php";

    // Sanitize user input to prevent SQL injection
    $nama_siswa = mysqli_real_escape_string($conn, $nama_siswa);
    $tanggal_lahir = mysqli_real_escape_string($conn, $tanggal_lahir);
    $alamat = mysqli_real_escape_string($conn, $alamat);
    $gender = mysqli_real_escape_string($conn, $gender);
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, md5($password));
    $id_kelas = mysqli_real_escape_string($conn, $id_kelas);

    // Perform the insert query
    $insert_query = "INSERT INTO siswa (nama_siswa, tanggal_lahir, gender, alamat, username, password, id_kelas) VALUES ('$nama_siswa', '$tanggal_lahir', '$gender', '$alamat', '$username', '$password', '$id_kelas')";
    $insert_result = mysqli_query($conn, $insert_query);

    // Check if insertion was successful
    if ($insert_result) {
        echo "<script>alert('Sukses menambahkan siswa');location.href='../frontend/login.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan siswa');</script>";
    }

    // Close database connection
    mysqli_close($conn);
}
