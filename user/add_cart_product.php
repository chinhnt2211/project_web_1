<?php
require_once "../core/core.user.php";
$id = $_GET["id_cart"];
$quantity = $_GET["quantity"];
// unset($_SESSION['cart']);
if(empty($_SESSION['cart'][$id])){
    $sql = "SELECT * FROM SANPHAM
    WHERE id = '$id'";
    $result = select($sql)[0];
    $_SESSION['cart'][$id]['name'] = $result['ten'];
    $_SESSION['cart'][$id]['image'] = $result['anh'];
    $_SESSION['cart'][$id]['price'] = $result['gia'];
    $_SESSION['cart'][$id]['quantity'] =$quantity ;
}else{
    $_SESSION['cart'][$id]['quantity'] +=$quantity;
}
    

header("location:product.php?id=$id");