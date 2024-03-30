<?php
session_start();
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
  header('location: login.php');
  exit();
}
// Deteksi apakah pengguna menggunakan perangkat mobile
function isMobile()
{
  return (bool) preg_match('/(android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini)/i', $_SERVER['HTTP_USER_AGENT']);
}

if (isMobile()) {
  // Jika perangkat adalah mobile, arahkan ke cannotPhone.php
  header('Location: cannot_phone.php');
  exit;
}
?>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="../img/logo-perpus.png" rel="icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Perpustakaan Online</title>
</head>

<style>
  ::-webkit-scrollbar {
    width: 8px;
  }

  ::-webkit-scrollbar-thumb {
    background-color: #0d1117;
    border-radius: 4px;
  }

  ::-webkit-scrollbar-track {
    background-color: #d1d1d1;
  }

  .uppercase {
    text-transform: capitalize;
  }
</style>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed w-100" style="z-index: 99;">
    <div class="container">
      <img src="../img/logo-perpus.png" alt="Logo Website" width="30" height="30" style="margin-right: 10px;">
      <a class="navbar-brand" href="#">Perpustakaan Online</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end w-100 text-center" id="navbarNav">
        <ul class="navbar-nav gap-3">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="buku.php">Buku</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="histori_peminjaman.php">Transaksi</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-danger" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>