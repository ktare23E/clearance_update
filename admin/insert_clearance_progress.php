<?php

require ('../dbconnect.php');


$sy_sem_id    = $_POST['sy_sem_id'];
$sem_id      = $_POST['sem_id'];
$status  = $_POST['status'];

$data = array(
    'sy_sem_id' => $sy_sem_id,
    'sem_id' => $sem_id,
    'status' => $status,
);

$insert = $db->insert('clearance_progress', $data);

if ($db->affected_rows >= 0) {
    header("location: clearance_progress.php");
} else {
    echo 'Error inserting user account.';
}
