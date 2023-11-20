<?php

require ('../dbconnect.php');


$department_name    = $_POST['department_name'];
$department_email      = $_POST['department_email'];
$department_phone_number  = $_POST['department_phone_number'];
$department_description  = $_POST['department_description'];
$department_status  = $_POST['department_status'];

$data = array(
    'department_name' => $department_name,
    'department_email' => $department_email,
    'department_phone_number' => $department_phone_number,
    'department_description' => $department_description,
    'department_status' => $department_status,
);

$insert = $db->insert('department', $data);

if ($db->affected_rows >= 0) {
    header("location: department.php");
} else {
    echo 'Error inserting user account.';
}
