<?php
require_once(__DIR__. "/config.php");

function execute($sql){
    #This is function to insert, update, delete
    $connect = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
    mysqli_query($connect,$sql);


    #close connection
    mysqli_close($connect);
}

function executeResult($sql){
    #This is function to insert, update, delete
    $connect = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
    $result = mysqli_query($connect,$sql);
    $row = mysqli_fetch_array($result);
    #close connection
    mysqli_close($connect);

    return $row;
}

function executeResultAll($sql){
    #This is function to insert, update, delete
    $connect = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
    $result = mysqli_query($connect,$sql);
    #close connection
    mysqli_close($connect);

    return $result;
}