<?php
error_reporting(0);
require "./shared.php";
$con = mysqli_connect($host, $user, $password, $database);
$email = stripslashes($_POST['userid']);
$password = stripslashes($_POST['oldpass']);
$newpassword = stripslashes($_POST['confpass']);
$query = mysqli_query($con,"select * from mst_user where login_pass='$password' AND email='$email'");
    //echo $query;
$rows = mysqli_num_rows($query);
if ($rows == 1) {
    $sqlup="UPDATE mst_user SET login_pass= '".$newpassword."' WHERE email= '".$email."'" ;
			   mysqli_query($con,$sqlup);
    echo "Password Changed!!!";
}else{
    echo "Invalid Password entered!!!";
}
?>