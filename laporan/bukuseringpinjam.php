<?php

require_once '../dbcontroller.php';
$db = new dbcontroller;

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Lima Judul Buku Yang sering Dipinjam:.xls");

$sql = "SELECT f_judul, COUNT(*) AS dipinjam FROM t_peminjaman 
INNER JOIN t_detailpeminjaman ON t_peminjaman.f_id=t_detailpeminjaman.f_idpeminjaman 
INNER JOIN t_detailbuku ON t_detailpeminjaman.f_iddetailbuku=t_detailbuku.f_id 
INNER JOIN t_buku ON t_detailbuku.f_idbuku=t_buku.f_id 
WHERE NOT f_tanggalkembali = '0000-00-00'
GROUP BY f_judul ORDER BY COUNT(*) DESC LIMIT 5";
$row = $db->getAll($sql);
$no = 1;
?>

<style>
    .w {
        border: solid black;
        padding: 1px;
    }
</style>

<table class='w table w-100'>
    <thead class='w table-primary'>
        <tr>
            <th class="w">No</th>
            <th class="w">Buku</th>
            <th class="w">Banyak buku yang dipinjam</th>
        </tr>
    </thead>
    <tbody>
        <table class="w">
            <?php foreach ($row as $r) : ?>
                <tr>
                    <td class="w"><?= $no++ ?></td>
                    <td class="w"><?= $r['f_judul'] ?></td>
                    <td class="w"><?= $r['dipinjam'] ?></td>
                </tr>
            <?php endforeach ?>
    </tbody>
</table>