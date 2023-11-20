<?php
# create database connection
include_once '../connection.php';

if(!empty($_POST["course_name"])) {
  $query = "SELECT * FROM course WHERE course_name ='" . $_POST["course_name"] . "'";
    $result = mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);

if(strtoupper(strtolower($count>0))) {
    echo "<span style='color:red;z-index:500'> Sorry this course is already exists .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
}else{
    echo "<span style='color:green;z-index:500'> Course Name available for Registration .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
?>