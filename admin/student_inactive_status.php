<?php

    include_once '../connection.php';

    
    $list_student_id = $_POST['list_student_id'];
    $status = $_POST['status'];

    foreach($list_student_id as $i => $student_id){

        $sql = "UPDATE student SET student_status = '$status' WHERE student_id = '$student_id'";

        $result= mysqli_query($conn,$sql);
        if($result){
            echo "success";
        }else{
            echo "Error";
        }
    }
?>