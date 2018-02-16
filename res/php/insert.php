<?php

require './shared.php';
require './class.emailApproval.php';

if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) OR strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    header('location: ../../index.html');
} else {

//$link = mysqli_connect("localhost", "id2382352_id2382352_root", "ENQUIRYbizcal", "id2382352_id2382352_courier");
//$link = mysqli_connect("localhost", "root", "", "courier");
$link = mysqli_connect($host, $user, $password, $database);
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$sfname = mysqli_real_escape_string($link, $_REQUEST['sfname']);
$smname = mysqli_real_escape_string($link, $_REQUEST['smname']);
$slname = mysqli_real_escape_string($link, $_REQUEST['slname']);
$sbuilding = mysqli_real_escape_string($link, $_REQUEST['sbuilding']);
$sstreet = mysqli_real_escape_string($link, $_REQUEST['sstreet']);
$spo = mysqli_real_escape_string($link, $_REQUEST['spo']);
$scity = mysqli_real_escape_string($link, $_REQUEST['scity']);
$sstate = mysqli_real_escape_string($link, $_REQUEST['sstate']);
$spin = mysqli_real_escape_string($link, $_REQUEST['spin']);
$semail = mysqli_real_escape_string($link, $_REQUEST['semail']);
$sphone = mysqli_real_escape_string($link, $_REQUEST['sphone']); 

$rfname = mysqli_real_escape_string($link, $_REQUEST['rfname']);
$rmname = mysqli_real_escape_string($link, $_REQUEST['rmname']);
$rlname = mysqli_real_escape_string($link, $_REQUEST['rlname']);
$rbuilding = mysqli_real_escape_string($link, $_REQUEST['rbuilding']);
$rstreet = mysqli_real_escape_string($link, $_REQUEST['rstreet']);
$rpo = mysqli_real_escape_string($link, $_REQUEST['rpo']);
$rcity = mysqli_real_escape_string($link, $_REQUEST['rcity']);
$rstate = mysqli_real_escape_string($link, $_REQUEST['rstate']);
$rpin = mysqli_real_escape_string($link, $_REQUEST['rpin']);
$remail = mysqli_real_escape_string($link, $_REQUEST['remail']);
$rphone = mysqli_real_escape_string($link, $_REQUEST['rphone']);
 
$ship_type = mysqli_real_escape_string($link, $_REQUEST['ship_type']); 
$weight = mysqli_real_escape_string($link, $_REQUEST['weight']); 
$quantity = mysqli_real_escape_string($link, $_REQUEST['quantity']); 
$bmode = mysqli_real_escape_string($link, $_REQUEST['bmode']); 
$freight = mysqli_real_escape_string($link, $_REQUEST['freight']); 

$tarea = mysqli_real_escape_string($link, $_REQUEST['tarea']); 
$bdate = mysqli_real_escape_string($link, $_REQUEST['bdate']); 
$book_date=$bdate;


function udate($format = 'u', $utimestamp = null) {
        if (is_null($utimestamp))
            $utimestamp = microtime(true);

        $timestamp = floor($utimestamp);
        $milliseconds = round(($utimestamp - $timestamp) * 1000000);

        return date(preg_replace('`(?<!\\\\)u`', $milliseconds, $format), $timestamp);
    }



date_default_timezone_set("Asia/Kolkata");
$dat=udate("h:i:s.u");




//date_default_timezone_set("Asia/Kolkata");
//$dat=date("h:i:sa");
$sstatus="hold";

if($smname=="")
{
$smname=$slname;
$slname="";
}
$sname=$sfname ." ". $smname ." ". $slname ;
if($rmname=="")
{
$rmname=$rlname;
$rlname="";
}
$rname=$rfname ." ". $rmname ." ". $rlname ;

$fin="FC";
$dat=substr($dat,0,13);
$time = preg_replace("/[^a-zA-Z0-9]+/", "", $dat);
$bldate = preg_replace("/[^a-zA-Z0-9]+/", "", $bdate);
$bldate=substr($bldate,4);
$consign_no=$fin . $bldate . $time ;

$sql="INSERT INTO `trans_courier`(`consign_no`, `ship_name`, `ship_phone`, `ship_email`, `rev_name`, `rev_phone`, `rev_email`, `type_of_ship`, `ship_weight`, `ship_qty`, `book_mode`, `freight`, `comments`, `book_date`) VALUES ('$consign_no','$sname','$sphone','$semail','$rname','$rphone','$remail','$ship_type','$weight','$quantity','$bmode','$freight','$tarea','$book_date')";

$result = mysqli_query($link,$sql);
//echo "$result";
//echo "$sql";

//printf ("New Record has id %d.\n", mysqli_insert_id($link));
$cid=mysqli_insert_id($link);

if($cid!="")
{
$rim="FC".$cid;
$sqlupt="UPDATE trans_courier SET invoice_no ='".$rim."'
               WHERE cid = ".$cid ;
			  $resupt=mysqli_query($link,$sqlupt);
			  
			  $sqli="INSERT INTO `address`(`cid`, `ship_building`, `ship_street`, `ship_po`, `ship_city`, `ship_state`, `ship_pin`, `rev_building`, `rev_street`, `rev_po`, `rev_city`, `rev_state`, `rev_pin`) VALUES ('$cid','$sbuilding','$sstreet','$spo','$scity','$sstate','$spin','$rbuilding','$rstreet','$rpo','$rcity','$rstate','$rpin')";
			  $result1 = mysqli_query($link,$sqli);
//echo "$result1";
//echo "$sqli";
$ship_office="kolkata";
$ship_mode="land";
$sqle="INSERT INTO `transit`(`consign_no`, `ship_status`, `ship_date`, `ship_time`, `ship_office` ) VALUES ('$consign_no','$sstatus','$book_date','$dat','$ship_office')";
  if(mysqli_query($link,$sqle)){
      echo "New shipment has been registered with Consignment no.".$consign_no." and Invoice no.".$rim;
      $status=new emailApproval();
      $status->mail_status($sname,$semail,$consign_no,'Registered');
               }
                else{
                    echo "Something went wrong!!!";
                }
  
//echo "$result2";
//echo "$sqle";
		}
		


 mysqli_close($link);
}