<?php
# create database connection
include_once '../connection.php';

if(!empty($_POST["school_year_and_sem"])) {
  $query = "SELECT * FROM sy_sem WHERE school_year_and_sem ='" . $_POST["school_year_and_sem"] . "'";
    // echo $query;
    // die();

    $result = mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);

if(strtoupper(strtolower($count>0))) {
    echo "<span style='color:red;z-index:500'> Sorry this school year already exists .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
}else{
    echo "<span style='color:green;z-index:500'> School Year available for Registration .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
?>