<?php
    include_once '../connection.php';

    if(isset($_POST['update'])){
    
    $department_id = $_POST['department_id'];
    $department_name = $_POST['department_name'];
    $department_email = $_POST['department_email'];
    $department_phone_number = $_POST['department_phone_number'];
    $department_description = $_POST['department_description'];
    $department_status = $_POST['department_status'];


    $sql = "UPDATE department SET department_name = '$department_name',department_email = '$department_email',department_phone_number='$department_phone_number',department_description='$department_description',department_status='$department_status' WHERE department_id = $department_id";

    $result= mysqli_query($conn,$sql);
    if($result){
        header("Location:department.php");
    }else{
        echo "Error Updating";
    }
}

?>