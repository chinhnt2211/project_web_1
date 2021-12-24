<?php
require_once(__DIR__. "/../../db/dbhelpler.php");

function check_id(){
    if(isset($_GET["id"]) && show_product_infor($_GET["id"])){
        return show_product_infor($_GET["id"]);
    }else{
        header("location:../index.php");
        return "";
    }
}


function show_product_infor($id){
    $sql = "select * from SANPHAM
    where id = '$id'";
    $result = executeResult($sql);
    return $result;
}

function name_producer(){
    $id = check_id()["id_nhasanxuat"];
    $sql = "select ten from NHASANXUAT
    where id = '$id'";
    $result = executeResult($sql);
    return $result;
}