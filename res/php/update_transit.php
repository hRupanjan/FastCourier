<?php

require './shared.php';
require './class.emailApproval.php';
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) OR strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    header('location: ../../index.html');
} else {
$link = mysqli_connect($host, $user, $password, $database);
//$link = mysqli_connect("localhost", "root", "", "courier");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$name=mysqli_real_escape_string($link, $_REQUEST['name']);
$s_mode=mysqli_real_escape_string($link, $_REQUEST['shipmode']);
$ship_status=mysqli_real_escape_string($link, $_REQUEST['status']);
$pick_date=mysqli_real_escape_string($link, $_REQUEST['pdate']);
$ship_date=mysqli_real_escape_string($link, $_REQUEST['sdate']);
$pick_time=$_REQUEST['ptime'];//mysqli_real_escape_string($link, $_REQUEST['ptime']);
$ship_time=mysqli_real_escape_string($link, $_REQUEST['stime']);
$comment=mysqli_real_escape_string($link, $_REQUEST['tarea']);
$cno=mysqli_real_escape_string($link, $_REQUEST['consign']);
$ship_office=mysqli_real_escape_string($link, $_REQUEST['office']);
//date_default_timezone_set("Asia/Kolkata");
//$dat=date("h:i");
//if($id && $ship_status && $book_mode && $pick_date && $pick_time!="" )
//{

//$date=date("Y/m/d");
$sqlupt2="UPDATE trans_courier SET comments ='".$comment."' WHERE consign_no = '".$cno."'" ;
			   mysqli_query($link,$sqlupt2);
			  $sqlm= "SELECT ship_email FROM trans_courier  WHERE consign_no = '".$cno."'" ;
					//echo $sqlupt2;

	$result3 = mysqli_query($link,$sqlm);
	
	$rows= mysqli_fetch_assoc($result3);
	$semail=$rows['ship_email'];
//	$ship_office="kolkata";
			   $sqlei="INSERT INTO `transit`(`consign_no`,`pick_time`, `pick_date`, `ship_status`, `ship_date`, `ship_time`, `ship_office`, `ship_mode`) VALUES ('$cno','$pick_time','$pick_date','$ship_status','$ship_date','$ship_time','$ship_office','$s_mode')";
//echo $sqlei;
			     if(mysqli_query($link,$sqlei)){
                     echo $cno." updated successfully!";
                     $status=new emailApproval();
                     $status->mail_status($name,$semail,$cno,$ship_status);
                 }
    else{
        echo "Something went wrong.";
    }
				// echo $sqlei;
				// header('Location: all.php');
//}
 mysqli_close($link);
}
?>