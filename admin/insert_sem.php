<?php

require ('../dbconnect.php');

$sem_name    = $_POST['sem_name'];

$data = array(
    'sem_name' => $sem_name
);

$insert = $db->insert('sem', $data);

if ($db->affected_rows >= 0) {
    header("location: semester.php");
} else {
    echo 'Error inserting user account.';
}
