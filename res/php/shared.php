<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) OR strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    header('location: ../../index.html');
} else {

//$host = 'localhost';
//$user = 'root';
//$password = '';
//$database = 'courier';

$host = 'localhost';
$user = 'id2382352_id2382352_root';
$password = 'ENQUIRYbizcal';
$database = 'id2382352_id2382352_courier';

}