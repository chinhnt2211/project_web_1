<?php

require_once "../../../core/core.user.php";

if ($_SERVER["REQUEST_METHOD"] === "GET"){
    if (isset($_GET['id']) && isset($_GET['type'])) {
        $id = $_GET['id'];
        switch ($_GET['type']) {
            case "increase":
                $_SESSION['cart'][$id]['quantity']++;
                echo "increase";
                break;
            case "decrease":
                if ($_SESSION['cart'][$id]['quantity'] > 1) {
                    $_SESSION['cart'][$id]['quantity']--;
                    echo "decrease";
                } else {
                    unset($_SESSION['cart'][$id]);
                        echo "delete";
                };
                break;
            case "delete":
                unset($_SESSION['cart'][$id]);
                echo "delete";
                break;
        }
    }
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_SESSION['id'];
    $cart = $_SESSION['cart'];
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $insert_id = insert("HOADON", [
        "id_khachhang" => $id,
        "hotennhan" => $name,
        "diachinhan" => $address,
        "sodienthoainhan" => $phone_number,
        "thoigiandat" => date('Y-m-d'),
        "tongtien" => $_SESSION["total"],
        "trangthaidon" => 1,
    ]);

    foreach ($cart as $product_id => $each) {
        $quantity = $each['quantity'];
        insert("HOADONCHITIET", [
            "id_hoadon" => $insert_id,
            "id_sanpham" => $product_id,
            "soluong" => $quantity,
        ]);
    }
    echo $insert_id;
    unset($_SESSION['cart']);
    unset($_SESSION["tongtien"]);
}
