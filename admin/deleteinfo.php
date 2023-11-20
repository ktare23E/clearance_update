<?php

require ('../dbconnect.php');

$student_id = $_POST['student_id'];

$delete = $db->delete('student', "student_id='$student_id'");

if ($db->affected_rows >= 0) {
    echo "Deleted";
} else {
    echo 'Error';
}
