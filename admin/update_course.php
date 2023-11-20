<?php
    include_once '../connection.php';

    if(isset($_POST['update'])){
    
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];
    $course_description = $_POST['course_description'];
    $course_status = $_POST['course_status'];

    $office_id = $_POST['office_id'];


    $sql = "UPDATE course SET course_name = '$course_name',course_description='$course_description',course_status='$course_status', office_id = $office_id WHERE course_id = $course_id";

    $result= mysqli_query($conn,$sql);
    if($result){
        header("Location:course.php");
    }else{
        echo "Error Updating";
    }
}

?>