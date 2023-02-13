<?php

session_start();
require_once "../dbcontroller.php";
$db = new dbcontroller;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRASI PERPUSTAKAAN</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>

<body>
    <div class="row">
        <div class="col-4 mx-auto mt-5">
            <div class="form-group">
                <form action="" method="post">
                    <div>
                        <h3>Registrasi Perpustakaan</h3>
                    </div>

                    <div class="mt-3">
                        <label for="">Nama</label>
                        <input type="text" name="nama" required class=" form-control">
                    </div>

                    <div class="mt-3">
                        <label for="">Username</label>
                        <input type="text" name="username" required class="form-control">
                    </div>

                    <div class="mt-3">
                        <label for="">Password</label>
                        <input type="password" name="password" required class="form-control">
                    </div>

                    <div class="mt-3">
                        <label for="">Tempat Lahir</label>
                        <input type="text" name="tmptlhr" required class=" form-control">
                    </div>

                    <div class="mt-3">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" name="tgllhr" required class=" form-control">
                    </div> <br>

                    <div>
                        <button type="submit" name="simpan" value="simpan" class="btn btn-dark">Regis</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $tmptlhr = $_POST['tmptlhr'];
    $tgllhr = $_POST['tgllhr'];


    $sql = "INSERT INTO t_anggota VALUES ('','$nama','$username','$password','$tmptlhr','$tgllhr')";

    $db->runSQL($sql);
    header("location:login.php");
}

?>