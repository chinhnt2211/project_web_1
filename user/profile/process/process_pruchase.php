<?php
require_once "../../../core/core.user.php";

if ($_SERVER["REQUEST_METHOD"] === "GET"){
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        update("HOADON", [
            "trangthaidon" => 4,
        ],"`id` = '$id'");
    }
}
header("Location:../purchase.php");
