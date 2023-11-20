<?php

include_once '../dbconnect.php';

$list_of_clearance = $db->query("SELECT * FROM clearance");

$data = array();

foreach($list_of_clearance as $row){
    $data[] = $row;
}
echo json_encode($data);