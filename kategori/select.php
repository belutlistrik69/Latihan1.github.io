<?php

$jumlahdata = $db->rowCOUNT("SELECT f_id FROM t_kategori");
$banyak = 5;

$halaman = ceil($jumlahdata / $banyak);

if (isset($_GET['p'])) {
    $p = $_GET['p'];
    $mulai = ($p * $banyak) - $banyak;
} else {
    $mulai = 0;
}

$sql = "SELECT * FROM t_kategori ORDER BY f_id ASC LIMIT  $mulai,$banyak ";
$row = $db->getALL($sql);
$no = 1 + $mulai;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERPUSTAKAAN PRA USK</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <style>
        .warna {
            background-color: #fad4ff;
        }

        .warna1 {
            background-color: #fef5ff;
        }
    </style>
</head>

<body>

    <form id="compose" name="compose" method="post" action="" enctype="multipart/form-data">
        <strong>
            <center>
                <h2 style="font-family:Georgia, 'Times New Roman', Times, serif;">KATEGORI</h2>
                <hr>
                <hr>
            </center>
        </strong>
        <div class="mt-5">
            <div class="container">
                <div class="float-left mr-4">
                    <a class="btn btn-dark" href="?f=kategori&m=insert" role="button">Add Data</a>
                </div><br>
                <table class="table table-bordered w-80">
                    <thead>
                        <tr class="warna">
                            <th>NO</th>
                            <th>KATEGORI</th>
                            <th>UPDATE</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody class="warna1">
                        <?php if (!empty($row)) { ?>
                            <?php foreach ($row as $r) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $r['f_kategori'] ?></td>
                                    <td><a style="color: black;" href="?f=kategori&m=update&id=<?php echo $r['f_id'] ?>"><button type="button" class="btn btn-outline-dark">Update</button></a></td>
                                    <td><a style="color: black;" href="?f=kategori&m=delete&id=<?php echo $r['f_id'] ?>"><button type="button" class="btn btn-outline-dark">Delete</button></a></td>
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

<nav aria-label="Pagination">
    <hr class="my-0" />
    <ul class="pagination my-4">
        <?php

        for ($i = 1; $i <= $halaman; $i++) {
            echo '<li class="page-item"><a class="page-link" style="color:black;" href="?f=kategori&m=select&p=' . $i . '">' . $i . '</a></li>';
        }

        ?>
    </ul>
</nav>