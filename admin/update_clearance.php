<?php
    include_once '../connection.php';

    if(isset($_POST['update'])){
    
    $clearance_id = $_POST['clearance_id'];
    $student_id = $_POST['student_id'];
    $clearance_progress_id = $_POST['clearance_progress_id'];
    // $clearance_status = $_POST['clearance_status'];
    // $course_id = $_POST['course_id'];
    $clearance_type_id = $_POST['clearance_type_id'];
    // $office_id = $_POST['office_id'];

    $query = "SELECT * FROM student WHERE student_id = '$student_id'";
    $result2 = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result2);

    $course_id = $row['course_id'];
    $office_id = $row['office_id'];

    
    $sql = "UPDATE clearance SET student_id = '$student_id', clearance_progress_id = $clearance_progress_id, clearance_type_id = $clearance_type_id, course_id = $course_id, office_id = $office_id WHERE clearance_id = $clearance_id";


    $result = mysqli_query($conn,$sql);

    if($result){
        header("Location:clearance.php");
    }else{
        echo "Error Updating";
    }
}

?>