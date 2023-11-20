<?php
# create database connection
include_once '../connection.php';

if(!empty($_POST["department_name"])) {
  $query = "SELECT * FROM department WHERE department_name ='" . $_POST["department_name"] . "'";
    $result = mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);

if(strtoupper(strtolower($count>0))) {
    echo "<span style='color:red'> Sorry Department Name already exists .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
}else{
    echo "<span style='color:green'> Department Name available for Registration .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
?>