<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "perpustakaan";

$conn = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
