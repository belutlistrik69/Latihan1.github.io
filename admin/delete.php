<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM t_admin WHERE f_id=$id";

    $db->runSQL($sql);
    echo "<script>window.location.assign('?f=admin&m=select');</script>";
}
