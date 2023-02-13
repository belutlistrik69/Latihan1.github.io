<?php

$bukuseluruh = $db->rowCOUNT("SELECT f_judul FROM t_buku");

$bukupinjam = $db->rowCOUNT("SELECT f_judul FROM t_buku INNER JOIN t_detailbuku ON 
t_buku.f_id=t_detailbuku.f_idbuku WHERE f_status='Tidak Tersedia'");

$bukutersedia = $db->rowCOUNT("SELECT f_judul FROM t_buku INNER JOIN t_detailbuku ON 
t_buku.f_id=t_detailbuku.f_idbuku WHERE f_status='Tersedia'");

$limabuku = $db->getALL("SELECT f_judul, COUNT(*) AS dipinjam FROM t_peminjaman 
INNER JOIN t_detailpeminjaman ON t_peminjaman.f_id=t_detailpeminjaman.f_idpeminjaman 
INNER JOIN t_detailbuku ON t_detailpeminjaman.f_iddetailbuku=t_detailbuku.f_id 
INNER JOIN t_buku ON t_detailbuku.f_idbuku=t_buku.f_id 
WHERE NOT f_tanggalkembali = '0000-00-00'
GROUP BY f_judul ORDER BY COUNT(*) DESC LIMIT 5");

$limaanggota = $db->getALL("SELECT f_nama, COUNT(*) AS pinjam FROM t_anggota 
INNER JOIN t_peminjaman ON t_anggota.f_id=t_peminjaman.f_idanggota 
GROUP BY f_nama ORDER BY COUNT(*) DESC LIMIT 5
");

$anggota = $db->getALL("SELECT f_nama, COUNT(*) AS kembali FROM t_anggota 
INNER JOIN t_peminjaman ON t_anggota.f_id=t_peminjaman.f_idanggota
INNER JOIN t_detailpeminjaman ON t_peminjaman.f_id=t_detailpeminjaman.f_idpeminjaman 
WHERE f_tanggalkembali ='0000-00-00' 
GROUP BY f_nama ORDER BY COUNT(*) DESC LIMIT 5
");
?>

<style>
    .warna {
        background-color: #f8d9fc;
    }

    .warna1 {
        background-color: #fbf0fc;
    }
</style>

<div class="container">
    <h4 class="text-center mt-4" style="font-family:Georgia, 'Times New Roman', Times, serif;">Laporan Perpustakaan</h4>
    <hr class="mb-4">
    <div class="row mt-4">
        <ul class="list-group list-group-flush">
            <div class="row mt-4">
                <div class="col-md-10 mb-3">
                    <li class="list-group-item">Jumlah Judul Keseluruhan : <?= $bukuseluruh ?></li>
                </div>
                <div class="col-md-2 mb-3">
                    <div class="float-left">
                        <a class="btn btn-outline-dark" href="../laporan/export.php" role="button">Export</a>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-10 mb-3">
                    <li class="list-group-item">Jumlah Buku Yang Dipinjam : <?= $bukupinjam ?></li>
                </div>
                <div class="col-md-2 mb-3">
                    <div class="float-left">
                        <a class="btn btn-outline-dark" href="../laporan/exportbukupinjam.php" role="button">Export</a>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-10 mb-3">
                    <li class="list-group-item">Jumlah Buku Yang Tersedia : <?= $bukutersedia ?></li>
                </div>
                <div class="col-md-2 mb-3">
                    <div class="float-left">
                        <a class="btn btn-outline-dark" href="../laporan/exportbukutersedia.php" role="button">Export</a>
                    </div>
                </div>
            </div>
            <hr>
            <li class="list-group-item">
                Lima Judul Buku Yang sering Dipinjam:
                <br>
                <div class="col-md-2 mb-3">
                    <div class="float-left">
                        <a class="btn btn-outline-dark" href="../laporan/bukuseringpinjam.php" role="button">Export</a>
                    </div>
                </div>
                <table class="table table-bordered w-100">
                    <tr class="warna">
                        <th>No</th>
                        <th>Buku</th>
                        <th>Banyak buku yang dipinjam</th>
                    </tr>

                    <?php $no = 1; ?>

                    <tbody class="warna1">
                        <?php if (!empty($limabuku)) { ?>
                            <?php foreach ($limabuku as $buku) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $buku['f_judul'] ?></td>
                                    <td><?= $buku['dipinjam'] ?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>

            </li><br>

            <li class="list-group-item">
                Lima Anggota yang Sering Pinjam Buku:
                <br>
                <div class="col-md-2 mb-3">
                    <div class="float-left">
                        <a class="btn btn-outline-dark" href="../laporan/anggotaseringpinjam.php" role="button">Export</a>
                    </div>
                </div>
                <table class="table table-bordered w-100">
                    <tr class="warna">
                        <th>No</th>
                        <th>Banyak Anggota yang Pinjam</th>
                        <th>Buku</th>
                    </tr>

                    <?php $no = 1; ?>

                    <tbody class="warna1">
                        <?php if (!empty($limaanggota)) { ?>
                            <?php foreach ($limaanggota as $ang) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $ang['f_nama'] ?></td>
                                    <td><?= $ang['pinjam'] ?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>

                </table>
            </li><br>

            <li class="list-group-item">Anggota Yang Belum Mengembalikan Buku:
                <table class="table table-bordered w-100">
                    <tr class="warna">
                        <th>No</th>
                        <th>Banyak Anggota Yang Belum Mengembalikan</th>
                        <th>Buku</th>
                    </tr>

                    <?php $no = 1; ?>

                    <tbody class="warna1">
                        <?php if (!empty($anggota)) { ?>
                            <?php foreach ($anggota as $ag) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $ag['f_nama'] ?></td>
                                    <td><?= $ag['kembali'] ?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>

                </table>
            </li>

        </ul>

    </div>
</div>