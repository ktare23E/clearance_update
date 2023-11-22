<?php

require ('../dbconnect.php');
include_once 'phpmailer2.php';
include_once '../connection.php';


$office_id    = $_POST['office_id'];
$clearance_progress_id  = $_POST['clearance_progress_id'];
// $admin_id  = $_POST['admin_id'];
$clearance_type_id = $_POST['clearance_type_id'];

$query = "SELECT * FROM admin WHERE office_id = '$office_id'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);

$admin_id = $row['admin_id'];




$data = array(
    'office_id' => $office_id,
    'clearance_progress_id' => $clearance_progress_id,
    'admin_id' => $admin_id,
    'clearance_type_id' => $clearance_type_id,
);

$insert = $db->insert('signing_office', $data);

$conn = mysqli_connect('localhost', 'root', '', 'clearance');


$sql = "SELECT * FROM new_signing_offices WHERE office_id = '$office_id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$office_email = $row['office_email'];
$clearance_type_name = $row['clearance_type_name'];
$sem_name = $row['sem_name'];
$school_year_and_sem = $row['school_year_and_sem'];
$clearance = strtolower($clearance_type_name);

sendEmail($office_email,"Clearance System Role Update","You have been set as a signing office of <b>$clearance</b> clearance type in school year <b>$school_year_and_sem $sem_name</b>.");

if ($db->affected_rows >= 0) {
    header("location: signing_office.php");
} else {
    echo 'Error inserting user account.';
}
