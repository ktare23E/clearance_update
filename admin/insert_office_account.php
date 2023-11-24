<?php

require ('../dbconnect.php');


$admin_name    = $_POST['admin_name'];
$admin_username  = $_POST['admin_username'];
$admin_password  = $_POST['admin_password'];
$office_id = $_POST['office_id'];
$user_type = $_POST['user_type'];
$is_officer = $_POST['is_officer'];

$data = array(
    'admin_name' => $admin_name,
    'admin_username' => $admin_username,
    'admin_password' => $admin_password,
    'office_id' => $office_id,
    'user_type' => $user_type,
    'is_officer' => $is_officer
);

$insert = $db->insert('admin', $data);

if ($db->affected_rows >= 0) {
    header("location: office_account.php");
} else {
    echo 'Error inserting user account.';
}
