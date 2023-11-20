<?php
    include_once '../connection.php';

    if(isset($_POST['update'])){
    
    $clearance_progress_id = $_POST['clearance_progress_id'];
    $sy_sem_id = $_POST['sy_sem_id'];
    $sem_id = $_POST['sem_id'];
    $status = $_POST['status'];


    $sql = "UPDATE clearance_progress SET sy_sem_id = '$sy_sem_id',sem_id = '$sem_id', status = '$status' WHERE clearance_progress_id = $clearance_progress_id";

    $result= mysqli_query($conn,$sql);
    if($result){
        header("Location:clearance_progress.php");
    }else{
        echo "Error Updating";
    }
}

?>