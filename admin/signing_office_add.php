<?php

    include_once '../connection.php';

    
    $list_office_id = $_POST['list_office_id'];
    $school_year = $_POST['school_year'];
    $semester = $_POST['semester'];
    $admin_id = $_POST['admin_id'];

    foreach($list_student_id as $i => $student_id){

        $sql = "INSERT INTO signing_office (office_id,school_year,semester,admin_id) VALUES ($list_office_id,'$school_year','$semester',$admin_id) ";

        $result= mysqli_query($conn,$sql);
        if($result){
            echo "success";
        }else{
            echo "Error";
        }
    }
?>