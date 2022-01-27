<?php
require_once(__DIR__."/../../core/core.php");
$method = $_SERVER["REQUEST_METHOD"];

if($method == "GET"){
    $term = isset($_GET["term"]) ? $_GET["term"] : NULL;

    $querySearch = "";
    if($term){
        $querySearch = " WHERE ten LIKE '%".$term."%'";
    }

    $dulieu = select("SELECT id, ten as value FROM theloai".$querySearch);

    echo json_encode($dulieu);
}