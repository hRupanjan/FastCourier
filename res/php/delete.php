<?php

error_reporting(E_ALL);
require './shared.php';

$link = mysqli_connect($host, $user, $password, $database);
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$consign = $_REQUEST['id'];
if ($consign != "") {
    $sqlde0 = "SELECT cid FROM trans_courier WHERE consign_no='$consign'";
    $result1 = mysqli_query($link, $sqlde0);
    $rows = mysqli_fetch_assoc($result1);
    $id_1 = $rows['cid'];
//	echo $sqlde0;
//	echo $consign;
//    $sqlde3 = "DELETE FROM transit WHERE consign_no IN (SELECT consign_no FROM trans_courier WHERE consign_no = '$consign')";
    $sqlde3 = "DELETE FROM transit WHERE consign_no = '$consign'";
    $resul4 = mysqli_query($link, $sqlde3);
//echo $sqlde3;
    $sqldel = "delete from trans_courier where cid=" . $id_1;
    $resul2 = mysqli_query($link, $sqldel);
    $sqlde2 = "delete from address where cid=" . $id_1;
    $resul3 = mysqli_query($link, $sqlde2);
    echo "done";
} else {
    echo 'error';
}