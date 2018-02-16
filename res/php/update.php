<?php
error_reporting(0);
require './shared.php';
//require './class.emailApproval.php';

//if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) OR strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
//    header('location: ../../index.html');
//} else {

//$link = mysqli_connect("localhost", "id2382352_id2382352_root", "ENQUIRYbizcal", "id2382352_id2382352_courier");
//$link = mysqli_connect("localhost", "root", "", "courier");
$link = mysqli_connect($host, $user, $password, $database);
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
	$id_1=$_POST['update'];
//$id_1='FC01150';
//echo 'hellop';
if($id_1!="")
	{
	$sqli = "SELECT c.*,e.* FROM trans_courier c,transit e WHERE c.consign_no=e.consign_no AND e.sid=(SELECT MAX(sid) FROM transit WHERE consign_no='".$id_1."')";
	//echo $sqli;
	$result2 = mysqli_query($link,$sqli);
	while($rows= mysqli_fetch_assoc($result2)){
    //echo $rows['consign_no'];
     $table = array();

            $data = NULL;
            $data->cons_id = $rows['consign_no'];
            $data->shipment_status = $rows['ship_status']; 
            $data->shipment_date = $rows['ship_date']; 
            $data->shipment_time = $rows['ship_time']; 
			$data->pick_date = $rows['pick_date']; 
            $data->pick_time = $rows['pick_time']; 
            $data->shipment_mode = $rows['ship_mode'];
            $data->shipment_office = $rows['ship_office'];
            $data->shipment_comments = $rows['comments'];
            $data->ship_name = $rows['ship_name'];
     $table[] = $data;
       echo json_encode($table);
    }
}
mysqli_close($link);
//}
?>
