<?php

// session_start();
// require ('dbconnect.php');

// $username = $_POST['admin_username'];
// $password = $_POST['admin_password'];


// $exist = $db->is_exist('admin', "admin_username='$username' AND admin_password='$password'");


// if ($exist)  {
//     $_SESSION['isloggedin'] = 1;
//     header("location: admin/web_loader.php");
// }
// else {
//     header("location: index.php?a=error");
// }

session_start();
// require ('dbconnect.php');

include_once 'connection.php';


$admin_username = $_POST['admin_username'];
$admin_password = $_POST['admin_password'];


// $student = $db->is_exist('student',"student_username = '$student_username' AND student_password = '$student_password'");

$sql = "SELECT * FROM admin_account WHERE admin_username = '$admin_username' AND admin_password = '$admin_password'";

$result = $conn->query($sql);

if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $_SESSION['admin_username'] = $admin_username;
    $_SESSION['admin_id'] = $row['admin_id'];
    $_SESSION['admin_name'] = $row['admin_name'];
    $_SESSION['office_id'] = $row['office_id'];
    $_SESSION['office_name'] = $row['office_name'];
    $_SESSION['user_type'] = $row['user_type'];
    $_SESSION['is_department'] = $row['is_department'];
    

    if($row['user_type'] == 'Admin') {
        $_SESSION['isloggedin'] = 1;
        header("location: admin/web_loader.php");
    }elseif($row['user_type'] == 'Office Admin') {
        $_SESSION['isOffice'] = 1;
        header("location: office_admin/office_admin_index.php");
    }
}
else{
    header("location: index.php?a=error");
    exit();
}
// }elseif($result->num_rows > 0){
//     $row = $result->fetch_assoc();
//     $_SESSION['admin_username'] = $admin_username;
//     $_SESSION['admin_name'] = $row['admin_name'];
//     $_SESSION['office_id'] = $row['office_id'];
//     $_SESSION['user_type'] = $row['user_type'];
    
//     $_SESSION['isOffice'] = 1;
//     header("location: office_admin/office_admin_index.php");

//     if($row['user_type'] != 'Office Admin') {
//         header("location: index.php?a=error");
//         exit();
//     }
// }

