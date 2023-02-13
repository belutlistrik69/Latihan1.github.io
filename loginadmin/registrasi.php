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
                        <input type="text" name="nama" required class="form-control">
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
                        <label for="">Level</label><br>
                        <select name="level" id="" class="form-control">
                            <option value="Pilih">Pilih...</option>
                            <option value="Admin">Admin</option>
                            <option value="Pustakawan">Pustakawan</option>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label for="">Status</label><br>
                        <select name="status" id="" class="form-control">
                            <option value="Pilih">Pilih...</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select> <br>

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
    $level = $_POST['level'];
    $status = $_POST['status'];


    $sql = "INSERT INTO t_admin VALUES ('','$nama','$username','$password','$level','$status')";

    $db->runSQL($sql);
    header("location:login.php");
}

?>