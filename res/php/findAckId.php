<?php

error_reporting(0);
require './shared.php';

if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) OR strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    header('location: ../../index.html');
} else {
    $id = $_REQUEST["id"];
    $con = mysqli_connect($host, $user, $password, $database);
    

    
        
    




    if ($_REQUEST["parent_page"] == 'index') {
        $sql = 'SELECT * FROM trans_courier WHERE consign_no = "' . $id . '"';

        $rs = mysqli_query($con, $sql);

        $num_rows = mysqli_num_rows($rs);

        if ($num_rows > 0) {
            $row = mysqli_fetch_assoc($rs);


            $sql_stat = 'SELECT ship_status FROM transit WHERE consign_no = "' . $id . '" ORDER BY sid DESC';
            $rs_stat = mysqli_query(mysqli_connect($host, $user, $password, $database), $sql_stat);
            $row_stat = mysqli_fetch_assoc($rs_stat);


            $obj->ship_status = $row_stat['ship_status'];
            $obj->ship_name = $row['ship_name'];
            $obj->invoice_no = $row['invoice_no'];
            $obj->ship_type = $row['type_of_ship'];
            $obj->book_date = $row['book_date'];
            $obj->book_mode = $row['book_mode'];
            die(json_encode($obj));
        } else {
            die('none');
        }
    } else if ($_REQUEST["parent_page"] == 'track') {
        $sql = 'SELECT * FROM transit WHERE consign_no = "' . $id . '" ORDER BY sid DESC';

        $rs = mysqli_query($con, $sql);

        $num_rows = mysqli_num_rows($rs);

        if ($num_rows > 0) {
            $table = array();
            while ($row = mysqli_fetch_assoc($rs)) {
                $table[] = $row;
            }
            die(json_encode($table));
        } else {
            die('none');
        }
    }
    
    
    
    
    
    
    
} 




//$id = $_REQUEST["id"];
//$con = mysqli_connect($host, $user, $password, $database);


