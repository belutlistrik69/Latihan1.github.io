<?php

require_once '../dbcontroller.php';
$db = new dbcontroller;

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Anggota Belum Kembali.xls");

$sql = "SELECT f_nama, COUNT(*) AS kembali FROM t_anggota 
INNER JOIN t_peminjaman ON t_anggota.f_id=t_peminjaman.f_idanggota
INNER JOIN t_detailpeminjaman ON t_peminjaman.f_id=t_detailpeminjaman.f_idpeminjaman 
WHERE f_tanggalkembali ='0000-00-00' 
GROUP BY f_nama ORDER BY COUNT(*) DESC LIMIT 5";
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
            <th class='w'>No</th>
            <th class='w'>Banyak Anggota Yang Belum Mengembalikan</th>
            <th class='w'>Buku</th>
        </tr>
    </thead>
    <tbody>
        <table class="w">
            <?php foreach ($row as $r) : ?>
                <tr>
                    <td class='w'><?= $no++ ?></td>
                    <td class='w'><?= $ag['f_nama'] ?></td>
                    <td class='w'><?= $ag['kembali'] ?></td>
                </tr>
            <?php endforeach ?>
    </tbody>
</table>