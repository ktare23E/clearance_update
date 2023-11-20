<?php

require ('../dbconnect.php');
require ('phpmailer.php');

include_once '../connection.php';
mysqli_select_db($conn, 'clearance');

$student_id    = $_POST['student_id'];
$clearance_progress_id = $_POST['clearance_progress_id'];
// $course_id  = $_POST['course_id'];
// $office_id = $_POST['office_id'];
$clearance_type_id = $_POST['clearance_type_id'];
// $date_created = $_POST['date_created'];
$current_date = date('Y-m-d');
$clearance_status = $_POST['clearance_status'];

$sql = "SELECT * FROM student WHERE student_id = '".$student_id."'";
$result= mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);


if($result->num_rows < 1){
    echo "<a href='clearance.php'>Back</a><br>";
    echo "This student '".$student_id."' does not exist. Please register this student first before creating a clearance.";
    die();
}

$office_id = $row['office_id'];
$course_id = $row['course_id'];


$query = "SELECT * FROM clearance WHERE student_id = '".$student_id."' AND clearance_progress_id = $clearance_progress_id";
$clearance_exist = $conn->query($query) or die($conn->error);

    if($clearance_exist->num_rows > 0){
        echo "<a href='clearance.php'>Back</a><br>";
        echo "This student '".$student_id."' has already have a  clearance for these school year and semester that you've been selected.";
        die();
    }


$data = array(
    'student_id' => $student_id,
    'clearance_progress_id' => $clearance_progress_id,
    'course_id' => $course_id,
    'office_id' => $office_id,
    'clearance_type_id'=> $clearance_type_id,
    'date_created' => $current_date,
    'clearance_status' => $clearance_status,
);

$insert = $db->insert('clearance', $data);


$sql = "SELECT * FROM view_clearance WHERE student_id = '$student_id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$student_email = $row['student_email'];
$clearance_type_name = $row['clearance_type_name'];
$sem_name = $row['sem_name'];
$school_year_and_sem = $row['school_year_and_sem'];
$clearance = strtolower($clearance_type_name);



sendEmail($student_email,"Online Clearance System","Your clearance for $school_year_and_sem $sem_name is now created please view your account to see the requirements of each signing offices.");


if ($db->affected_rows >= 0) {
    header("location: clearance.php");
} else {
    echo 'Error inserting user account.';
}
