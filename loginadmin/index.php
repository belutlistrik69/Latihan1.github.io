<?php

require_once "../dbcontroller.php";
$db = new dbcontroller;

session_start();
if (!isset($_SESSION['admin'])) {
    header("location:index.php");
}

if (isset($_GET['log'])) {
    session_destroy();

    header("location:../index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>PERPUSTAKAAN</title>
    <style>
        .bg {
            background-color: #fcedff;
        }

        .bg-navbar {
            background-color: #e5a2f2;
        }

        /* #f5c19f */
    </style>
</head>

<body class="bg">
    <nav class="navbar navbar-expand bg-navbar">
        <div class="container-fluid">
            <div class="mx-2">
                <img src="../images/logo.jpeg" height="60" alt="Logo" loading="lazy" style="margin-top: -1px;" />
            </div>
            <a style="color: white;" class="navbar-brand" class="nav-link">PERPUSTAKAAN</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                    <li class="nav-item">
                        <a style="color: white;" class="nav-link active" aria-current="page" href="index.php"><i class="bi bi-house-door-fill mx-1"></i>Home</a>
                    </li>

                    <li class="nav-item">
                        <a style="color: white;" class="nav-link active"><i class="bi bi-people mx-2"></i>Name : <?php echo $_SESSION['admin'] ?></a>
                    </li>

                    <li class="nav-item">
                        <a style="color: white;" class="nav-link active" href="?log=logout"><i class="bi bi-box-arrow-left mx-2"></i>Logout</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container">

        <div class="row mt-4">
            <div class="col-md-2">
                <ul class="nav flex-column">
                    <?php
                    $level = $_SESSION['level'];
                    switch ($level) {
                        case 'Admin':
                            echo '
                    <li class="nav-item"><a style="color: black;" class="nav-link" href="?f=kategori&m=select"><i class="bi bi-list-ul mx-2"></i>Kategori</a></li>
                    <hr>
                    <li class="nav-item"><a style="color: black;" class="nav-link" href="?f=buku&m=select"><i class="bi bi-journal-bookmark-fill mx-2"></i>Buku</a></li>
                    <hr>
                    <li class="nav-item"><a style="color: black;" class="nav-link" href="?f=admin&m=select"><i class="bi bi-fingerprint mx-2"></i>Admin</a></li>
                    <hr>
                    <li class="nav-item"><a style="color: black;" class="nav-link" href="?f=anggota&m=select"><i class="bi bi-people-fill mx-2"></i>Anggota</a></li>
                    <hr>
                    <li class="nav-item"><a style="color: black;" class="nav-link" href="?f=peminjaman&m=select"><i class="bi bi-folder-plus mx-2"></i>Peminjaman</a></li>
                    <hr>
                    <li class="nav-item"><a style="color: black;" class="nav-link" href="?f=pengembalian&m=select"><i class="bi bi-folder-minus mx-2"></i></i>Pengembalian</a></li>
                    <hr>
                    <li class="nav-item"><a style="color: black;" class="nav-link" href="?f=laporan&m=select"><i class="bi bi-folder2-open mx-2"></i>Laporan Pengembalian</a></li>
                    <hr>
                    ';
                            break;
                        case 'Pustakawan':
                            echo '
                            <li class="nav-item"><a style="color: black;" class="nav-link" href="?f=anggota&m=select"><i class="bi bi-people-fill mx-2"></i>Anggota</a></li>
                            <hr>
                            <li class="nav-item"><a style="color: black;" class="nav-link" href="?f=peminjaman&m=select"><i class="bi bi-folder-plus mx-2"></i>Peminjaman</a></li>
                            <hr>
                            <li class="nav-item"><a style="color: black;" class="nav-link" href="?f=pengembalian&m=select"><i class="bi bi-folder-minus mx-2"></i></i>Pengembalian</a></li>
                            <hr>
                            <li class="nav-item"><a style="color: black;" class="nav-link" href="?f=laporan&m=select"><i class="bi bi-folder2-open mx-2"></i>Laporan Pengembalian</a></li>
                            <hr>
                            ';
                            break;
                    }
                    ?>

                </ul>
            </div>
            <div class="col-md-10">
                <?php
                if (isset($_GET['f']) && isset($_GET['m'])) {
                    switch ($level) {
                        case 'Admin':
                            $f = $_GET['f'];
                            $m = $_GET['m'];

                            $file = '../' . $f . '/' . $m . '.php';

                            include $file;
                            break;
                        case 'Pustakawan':
                            if ($_GET['f'] == 'anggota' or $_GET['f'] == 'peminjaman' or $_GET['f'] == 'pengembalian' or $_GET['f'] == 'laporan') {
                                $f = $_GET['f'];
                                $m = $_GET['m'];

                                $file = '../' . $f . '/' . $m . '.php';

                                include $file;
                            } else {
                                echo '<center> Anda Tidak Memiliki Hak Akses Halaman Ini </center>';
                            }

                            break;
                        default:
                            echo '<center> Anda Tidak Memiliki Hak Akses Halaman Ini </center>';
                            break;
                    }
                } else {
                    require_once "../peminjaman/select.php";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>