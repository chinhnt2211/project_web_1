<?php
require_once "../../../core/core.user.php";

if ($_SERVER["REQUEST_METHOD"] === "GET"){
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        update("HOADON", [
            "trangthaidon" => 4,
        ],"`id` = '$id'");
        $result = query("SELECT * FROM `HOADONCHITIET` WHERE `id_hoadon` = '$id'");
        foreach ($result as $row) {
            $id_sanpham = $row['id_sanpham'];
            insert("DANHGIA", [
                "id_khachhang" => $_SESSION["id"],
                "id_sanpham" => $id_sanpham,
                "id_hoadon" => $id
            ]);
        }
    }
}
header("Location:../purchase.php");
