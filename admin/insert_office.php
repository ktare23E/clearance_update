<?php

require ('../dbconnect.php');


$office_name    = $_POST['office_name'];
$office_email      = $_POST['office_email'];
$office_phone_number  = $_POST['office_phone_number'];
$office_description  = $_POST['office_description'];
$office_status  = $_POST['office_status'];
$is_department = $_POST['is_department'];

$data = array(
    'office_name' => $office_name,
    'office_email' => $office_email,
    'office_phone_number' => $office_phone_number,
    'office_description' => $office_description,
    'office_status' => $office_status,
    'is_department' => $is_department,
);

$insert = $db->insert('office', $data);

if ($db->affected_rows >= 0) {
    header("location: office.php");
} else {
    echo 'Error inserting user account.';
}
