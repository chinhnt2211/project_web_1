<?php
require_once(__DIR__. "/../lib/db/dbhelpler.php");


function check_find(){
    if(isset($_GET['find'])){
        $find = $_GET["find"];
    }else{
        $find="";
    }
    return $find;
}
function show_product(){
    $find = check_find();
    $sql = "select * from SANPHAM
    where ten like '%$find%'";
    $result = executeResultAll($sql);
    return $result;
}