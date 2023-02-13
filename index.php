<?php

session_start();
require_once "dbcontroller.php";
$db = new dbcontroller;

if (isset($_GET['log'])) {
    unset($_SESSION['id']);
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PERPUSTAKAAN</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        .bg {
            background-color: #fff8f2;
        }

        .bg-navbar {
            background-color: #f5c19f;
        }

        .warna {
            background-color: #fcfcca;
        }

        .warna1 {
            background-color: #fceeca;
        }
    </style>
</head>

<body class="bg">
    <nav class="navbar navbar-expand bg-navbar">
        <div class="container-fluid">
            <div class="mx-2">
                <img src="images/logo.jpeg" height="60" alt="Logo" loading="lazy" style="margin-top: -1px;" />
            </div>
            <a style="color: white;" class="navbar-brand">PERPUSTAKAAN</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">

                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['id'])) {
                            $ida = $_SESSION['id'];
                            $sql = "SELECT f_username FROM t_anggota WHERE f_id=$ida";
                            $row = $db->getITEM($sql);
                            echo '
                            <a style="color: white;" class="nav-link active" href="?f=home&m=memberarea"> Anggota : ' . $row['f_username'] . ' </a> </div>
                            <a style="color: white;" class="nav-link active" href="?log=logout"><i class="bi bi-box-arrow-left mx-2"></i>Logout</a></div>';
                        } else {
                            echo '<a style="color: white;" class="nav-link active" href="login.php"><i class="bi bi-people mx-2"></i>Login</a></div>';
                            // echo '<a style="color: white;" class="nav-link active" href="loginadmin/loginpus.php"><i class="bi bi-people mx-2"></i>Pustakawan</a>';
                            // echo '<a style="color: white;" class="nav-link active" href="home/login.php"><i class="bi bi-person mx-2"></i>Anggota</a>';
                        }
                        ?>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="row mt-5">
        <center>
            <div class="col-md-9">
                <?php
                if (isset($_GET['f']) && isset($_GET['m'])) {
                    $f = $_GET['f'];
                    $m = $_GET['m'];

                    $file = $f . '/' . $m . '.php';

                    require_once $file;
                } else {
                    require_once "home/daftarbuku.php";
                }
                ?>
            </div>
        </center>
    </div>

    <div class="row mt-5">
        <div class="col">
            <p class="text-center">2022-copyright@najlahaura.com</p>
        </div>
    </div>
    </div>
</body>

</html>