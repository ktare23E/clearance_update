<?php
    include_once '../connection.php';

    if(isset($_POST['update'])){
    
    $student_id = $_POST['student_id'];
    $student_password = $_POST['student_password'];
    


    $sql = "UPDATE student SET student_password = '$student_password' WHERE student_id = '".$student_id."'";

    $result= mysqli_query($conn,$sql);
    if($result){
        header("Location:student_profile.php");
    }else{
        echo "Error Updating";
    }
}

?>