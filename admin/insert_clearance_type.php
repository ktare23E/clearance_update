<?php

require ('../dbconnect.php');

$clearance_type_name = $_POST['clearance_type_name'];
$clearance_type_description = $_POST['clearance_type_description'];


$data = array(
    'clearance_type_name' => $clearance_type_name,
    'clearance_type_description' => $clearance_type_description,
);

$insert = $db->insert('clearance_type', $data);

if ($db->affected_rows >= 0) {
    header("location: clearance_type.php");
} else {
    echo 'Error inserting user account.';
}
