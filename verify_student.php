<?php
session_start();
// require ('dbconnect.php');

include_once 'connection.php';


$student_id = $_POST['student_id'];
$student_password = $_POST['student_password'];


// $student = $db->is_exist('student',"student_username = '$student_username' AND student_password = '$student_password'");

$sql = "SELECT * FROM student_details WHERE student_id = '$student_id' AND student_password = '$student_password'";
$result = $conn->query($sql);

if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    // $_SESSION['student_username'] = $student_username;
    $_SESSION['student_id'] = $row['student_id'];
    $_SESSION['student_first_name'] = $row['student_first_name'];
    $_SESSION['student_middle_name'] = $row['student_middle_name'];
    $_SESSION['student_last_name'] = $row['student_last_name'];
    $_SESSION['student_year'] = $row['student_year'];
    $_SESSION['course_name'] = $row['course_name'];
    $_SESSION['office_name'] = $row['office_name'];
    $_SESSION['student_email'] = $row['student_email'];
    $_SESSION['student_gender'] = $row['student_gender'];
    $_SESSION['student_status'] = $row['student_status'];
    $_SESSION['student_profile'] = $row['student_profile'];
    
    $_SESSION['isStudent'] = 1;
    header("location: student_user/student_user_index.php");
}
else {
    header("location: student_login.php?a=error");
}
