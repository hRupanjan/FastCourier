

<?php

error_reporting(E_ALL);
require './shared.php';
//if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) OR strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
//    header('location: ../../index.html');
//} else {

$link = mysqli_connect($host, $user, $password, $database);
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$finame = $_REQUEST['search_key'];
$iname = $_REQUEST['filter_date_to'];
$miname = $_REQUEST['filter_date_from'];
$date = $_REQUEST['filter_date_by'];

$date_param = "";




if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $finame)) {
    $date_param = "OR (book_date ='".$finame."') OR (pick_date ='".$finame."')";
} else {
    $date_param = "";
}


/* form */
$sqli = "SELECT c.*, p.*,e.* FROM trans_courier c,address p,transit e WHERE c.cid=p.cid AND c.consign_no=e.consign_no AND e.sid=(SELECT MAX(sid) FROM transit WHERE consign_no=e.consign_no)";

if ($finame != "") {
    $sqli .= " AND ((ship_name like '%" . $finame . "%') OR (rev_name like '%" . $finame . "%') OR (ship_mode like '%" . $finame . "%') OR (c.consign_no ='$finame') OR (type_of_ship like '%" . $finame . "%')  OR (ship_status like '%" . $finame . "%') OR (book_mode like '%" . $finame . "%') OR (invoice_no ='$finame') ".$date_param.")";
} elseif ($miname && $iname != "") {
    $sqli .= " AND $date BETWEEN '$miname' and '$iname' ";
}

$sqli .= " ORDER BY book_date DESC";

//echo $sqli;

$result1 = mysqli_query($link, $sqli);



if (mysqli_num_rows($result1) > 0) {
    $table = array();
    // output data of each row
    while ($rows = mysqli_fetch_assoc($result1)) {
//        echo json_encode($rows);
        $data = new stdClass();
        $data->cons_id = $rows['consign_no'];
        $data->invoice_no = $rows['invoice_no'];

        $data->shipment_status = $rows['ship_status']; //1
        $data->shipment_date = $rows['ship_date']; //2
        $data->shipment_time = $rows['ship_time']; //3
        $data->shipment_office = $rows['ship_office']; //4
        $data->shipment_mode = $rows['ship_mode']; //5
        $data->shipment_freight = $rows['freight']; //6
        $data->shipment_weight = $rows['ship_weight']; //7
        $data->shipment_qty = $rows['ship_qty']; //8
        $data->shipment_type = $rows['type_of_ship']; //9
        $data->shipment_book_mode = $rows['book_mode']; //10
        $data->shipment_book_date = $rows['book_date']; //11
        $data->shipment_pick_date = $rows['pick_date']; //12
        $data->shipment_pick_time = $rows['pick_time']; //13
        $data->shipment_comments = $rows['comments']; //14


        $data->ship_name = $rows['ship_name'];
        $data->ship_phone = $rows['ship_phone'];
        $data->ship_email = $rows['ship_email'];
        $data->ship_addr = $rows['ship_building'] . ' , ' . $rows['ship_street'] . ' , ' . $rows['ship_po'] . ' , ' . $rows['ship_city'] . ' , ' . $rows['ship_state'] . ' , PIN - ' . $rows['ship_pin'];

        $data->rev_name = $rows['rev_name'];
        $data->rev_phone = $rows['rev_phone'];
        $data->rev_email = $rows['rev_email'];
        $data->rev_addr = $rows['rev_building'] . ' , ' . $rows['rev_street'] . ' , ' . $rows['rev_po'] . ' , ' . $rows['rev_city'] . ' , ' . $rows['rev_state'] . ' , PIN - ' . $rows['rev_pin'];

        $table[] = $data;
    }
    
    echo json_encode($table);
}
else
{
    echo json_encode('error');
}
//}