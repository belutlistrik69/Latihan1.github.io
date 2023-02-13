<?php
$ida = $_SESSION['id'];

$sql = "SELECT t_peminjaman.f_id AS idp, t_buku.f_judul, t_kategori.f_kategori, t_admin.f_nama AS admin, t_anggota.f_nama AS anggota,t_peminjaman.f_tanggalpeminjaman
    FROM t_peminjaman
    INNER JOIN t_admin ON t_peminjaman.f_idadmin=t_admin.f_id
    INNER JOIN t_anggota ON t_peminjaman.f_idanggota=t_anggota.f_id
    INNER JOIN t_detailpeminjaman ON t_peminjaman.f_id=t_detailpeminjaman.f_idpeminjaman
    INNER JOIN t_detailbuku ON t_detailpeminjaman.f_iddetailbuku=t_detailbuku.f_id
    INNER JOIN t_buku ON t_detailbuku.f_idbuku=t_buku.f_id
    INNER JOIN t_kategori ON t_buku.f_idkategori = t_kategori.f_id WHERE t_anggota.f_id =$ida;";
$row = $db->getALL($sql);
$no = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERPUSTAKAAN PRA USK</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>

<body>

    <form id="compose" name="compose" method="post" action="" enctype="multipart/form-data">
        <strong>
            <center>
                <h2 style="font-family:Georgia, 'Times New Roman', Times, serif;">PEMINJAMAN</h2>
                <hr>
                <hr>
            </center>
        </strong>
        <div class="mt-5">
            <div class="container">
                <table class="table table-bordered w-80">
                    <tr class="warna">
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Kategori</th>
                        <th>Admin</th>
                        <th>Anggota</th>
                        <th>Tanggal Pinjam</th>
                        <!-- <th>Update</th> -->
                        <!-- <th>Delete</th> -->
                    </tr>

                    <tbody class="warna1">
                        <?php if (!empty($row)) { ?>
                            <?php foreach ($row as $r) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $r['f_judul'] ?></td>
                                    <td><?php echo $r['f_kategori'] ?></td>
                                    <td><?php echo $r['admin'] ?></td>
                                    <td><?php echo $r['anggota'] ?></td>
                                    <td><?php echo $r['f_tanggalpeminjaman'] ?></td>
                                    <!-- <td><a style="color:white;" type="button" class="btn btn-warning" class="nav-link" href="?f=peminjaman&m=update&id=<?php echo $r['idp'] ?>">Update</a></button></td> -->
                                    <!-- <td><a style="color:white;" type="button" class="btn btn-danger" class="nav-link" href="?f=peminjaman&m=delete&id=<?php echo $r['idp'] ?>">Delete</a></button></td> -->
                                </tr>
                            <?php endforeach ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</body>

</html>