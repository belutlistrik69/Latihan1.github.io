<div class="mt-3">
    <div class="container">
        <h3 style="font-family:Georgia, 'Times New Roman', Times, serif;">Insert Anggota</h3>
        <hr>
        <div class="form-group">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group w-50 mt-3">
                    <label for="">Nama</label>
                    <input type="text" name="nama" required class=" form-control">
                </div>

                <div class="form-group w-50 mt-3">
                    <label for="">Username</label>
                    <input type="text" name="username" required class=" form-control">
                </div>

                <div class="form-group w-50 mt-3">
                    <label for="">Password</label>
                    <input type="password" name="password" required class=" form-control">
                </div>

                <div class="form-group w-50 mt-3">
                    <label for="">Tempat Lahir</label>
                    <input type="text" name="tmptlhr" required class=" form-control">
                </div>

                <div class="form-group w-50 mt-3">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tgllhr" required class=" form-control">
                </div><br>
                <button type="submit" name="simpan" value="simpan" class="btn btn-dark">Save</button>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) {

    //inisialisasi
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $tmptlhr = $_POST['tmptlhr'];
    $tgllhr = $_POST['tgllhr'];

    //insert produk
    $sql = "INSERT INTO t_anggota VALUES('','$nama','$username','$password','$tmptlhr','$tgllhr')";
    $db->runSQL($sql);
    echo "<script>window.location.assign('?f=anggota&m=select');</script>";
}
?>