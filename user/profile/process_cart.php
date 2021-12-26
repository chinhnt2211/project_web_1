<?php

require_once "../../core/core.user.php";

if(isset($_GET['id_dec'])){
    $id = $_GET['id_dec'];
    if($_SESSION['cart'][$id]['quantity']>1){
        $_SESSION['cart'][$id]['quantity']--; 
    }else{
        unset($_SESSION['cart'][$id]);
    }
}
if(isset($_GET['id_inc'])){
    $id = $_GET['id_inc'];
    $_SESSION['cart'][$id]['quantity']++; 
}
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    unset($_SESSION['cart'][$id]);
}

header("location:cart.php");