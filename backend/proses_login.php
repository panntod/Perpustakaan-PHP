<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    function redirect($message) {
        echo "<script>alert('$message');location.href='../frontend/login.php';</script>";
        exit;
    }

    if (empty($username) || empty($password)) {
        redirect("Username dan Password tidak boleh kosong");
    }

    // Include the connection file
    require_once "../connect.php";

    // Sanitize user input to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, md5($password));

    $qry_login = mysqli_query($conn, "SELECT * FROM siswa WHERE username = '$username' AND password = '$password'");

    if (!$qry_login) {
        redirect("Error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($qry_login) > 0) {
        $dt_login = mysqli_fetch_array($qry_login);
        session_start();
        $_SESSION['id_siswa'] = $dt_login['id_siswa'];
        $_SESSION['nama_siswa'] = $dt_login['nama_siswa'];
        $_SESSION['role'] = $dt_login['role'];
        $_SESSION['status_login'] = true;
        header("location: ../frontend/home.php");
    } else {
        redirect("Username dan Password tidak benar");
    }
}
