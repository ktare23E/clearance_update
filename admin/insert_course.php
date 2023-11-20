<?php

require ('../dbconnect.php');


$course_name    = $_POST['course_name'];
$course_description  = $_POST['course_description'];
$course_status  = $_POST['course_status'];
$office_id = $_POST['office_id'];

$data = array(
    'course_name' => $course_name,
    'course_description' => $course_description,
    'course_status' => $course_status,
    'office_id'=> $office_id,
);

$insert = $db->insert('course', $data);

if ($db->affected_rows >= 0) {
    header("location: course.php");
} else {
    echo 'Error inserting user account.';
}
