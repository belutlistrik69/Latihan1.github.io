<?php

session_start();
require_once "../dbcontroller.php";
$db = new dbcontroller;

if (isset($_SESSION['f_id'])) {
    header("location:../?f=home&m=memberarea");
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PERPUSTAKAAN PRA USK</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>

<div class="row">
    <div class="col-4 mx-auto mt-5">
        <div class="form-group">
            <form action="" method="post">
                <div>
                    <h4 style="font-family:Georgia, 'Times New Roman', Times, serif;">LOGIN ANGGOTA PERPUSTAKAAN</h4>
                </div><br>
                <div class="form-group">
                    <label for="">USERNAME</label>
                    <input type="text" name="f_username" required class="form-control">
                </div><br>
                <div class="form-group">
                    <label for="">PASSWORD</label>
                    <input type="password" name="password" required class="form-control">
                </div><br>
                <div>
                    <input type="submit" name="login" value="LOGIN" class="btn btn-dark">
                </div>
                <!-- <div>
                    <p class="mb-0">Don't have an account? <a href="registrasi.php" class="text-black-50 fw-bold">Sign
                            Up</a>
                    </p>
                </div> -->

            </form>
        </div>
    </div>
</div>

<?php

if (isset($_POST['login'])) {
    $f_username = $_POST['f_username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM t_anggota WHERE f_username='$f_username' AND f_password='$password' ";
    $count = $db->rowCOUNT($sql);

    if ($count == 0) {
        echo "<center><h3>Username Atau Password Salah</h3></center>";
    } else {
        $sql = "SELECT * FROM t_anggota WHERE f_username='$f_username' AND f_password='$password' ";
        $row = $db->getITEM($sql);

        $_SESSION['anggota'] = $row['f_f_username'];
        $_SESSION['id'] = $row['f_id'];

        header("location:../?f=home&m=memberarea");
    }
}
?>