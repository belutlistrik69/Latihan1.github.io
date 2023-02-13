<?php
if (isset($_POST['opsi'])) {
    $opsi = $_POST['opsi'];
    $where = "WHERE f_idkategori=$opsi";
} else {
    $opsi = 0;
    $where = "";
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM t_anggota WHERE f_id=$id";
    $row = $db->getITEM($sql);
}

?>
<div class="mt-3">
    <div class="container">
        <h3 style="font-family:Georgia, 'Times New Roman', Times, serif;">Update Anggota</h3>
        <hr>

        <?php
        $t_kategori = $db->getALL("SELECT * FROM t_kategori $where");
        ?>
        <div class="form-group">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group w-50 mt-3">
                    <label for="">Nama</label>
                    <input type="text" name="nama" required value="<?php echo $row['f_nama'] ?>" class=" form-control">
                </div>


                <div class="form-group w-50 mt-3">
                    <label for="">Username</label>
                    <input type="text" name="username" required value="<?php echo $row['f_username'] ?>" class=" form-control">
                </div>

                <div class="form-group w-50 mt-3">
                    <label for="">Password</label>
                    <input type="password" name="password" required placeholder="Password" class="form-control">
                </div>

                <div class="form-group w-50 mt-3">
                    <label for="">Tempat Lahir</label>
                    <input type="text" name="tempatlahir" required value="<?php echo $row['f_tempatlahir'] ?>" class=" form-control">
                </div>

                <div class="form-group w-50 mt-3">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tanggallahir" required value="<?php echo $row['f_tanggallahir'] ?>" class=" form-control">
                </div><br>
                <button type="submit" name="simpan" value="simpan" class="btn btn-dark">Save</button>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) {
    //Inisialisasi
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $tempatlahir = $_POST['tempatlahir'];
    $tanggallahir = $_POST['tanggallahir'];
    //update data
    $sql = "UPDATE t_anggota SET f_nama='$nama', f_username='$username', f_password='$password', f_tempatlahir='$tempatlahir', f_tanggallahir='$tanggallahir' WHERE f_id=$id";
    $db->runSQL($sql);
    echo "<script>window.location.assign('?f=anggota&m=select');</script>";
}
?>