<?php
require_once(__DIR__ . "/../../core/core.php");

// kiểm tra thông tin id xem tồn tại không

$id = isset($_POST["id"]) ? $_POST["id"] : NULL;
$kiemtra = query("SELECT * FROM HOADON WHERE id = '{$id}'");

if ($kiemtra->num_rows === 0) {
    header("Location: ./cart.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_nhanvien = $sid;
    update("HOADON",[
        "id_nhanvien" => "$id_nhanvien",
        "trangthaidon" => "2",
    ], "id='{$id}'");
    header("Location: ./cart.php");
    exit();
}
?>