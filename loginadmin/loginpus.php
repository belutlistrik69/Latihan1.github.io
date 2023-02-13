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
    <title>LOGIN PERPUSTAKAAN PRA USK</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>

<body>
    <div class="row">
        <div class="col-4 mx-auto mt-5">
            <div class="form-group">
                <form action="" method="post">
                    <div>
                        <h3>Login Perpustakaan Pra USK</h3>
                    </div>
                    <div class="form-group">
                        <label for="">USER</label>
                        <input type="text" name="username" required class="form-control">
                    </div><br>
                    <div class="form-group">
                        <label for="">PASSWORD</label>
                        <input type="password" name="password" required class="form-control">
                    </div><br>
                    <div>
                        <input type="submit" name="login" value="LOGIN" class="btn btn-dark">
                    </div>
                    <div class="mt-3">
                        <center>
                            <p class="mb-0">Don't have an account? <a href="registrasi.php" class="text-black-50 fw-bold">Sign
                                    Up</a>
                            </p>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM t_admin WHERE f_username='$user' AND f_password='$password' AND f_level='Pustakawan'";
    $count = $db->rowCOUNT($sql);

    if ($count == 0) {
        echo "<center><h3>Nama User Atau Password Salah</h3></center>";
    } else {
        $sql = "SELECT * FROM t_admin WHERE f_username='$user' AND f_password='$password'";
        $row = $db->getITEM($sql);

        $_SESSION['admin'] = $row['f_username'];
        $_SESSION['level'] = $row['f_level'];
        $_SESSION['id'] = $row['f_id'];

        header("location:index.php");
    }
}
?>