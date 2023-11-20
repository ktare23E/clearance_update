<?php 

include_once '../connection.php';



if(isset($_GET['clearance_progress_id'])){
    $id = $_GET['clearance_progress_id'];
    $sql = "UPDATE clearance_progress SET status = 'Inactive' WHERE clearance_progress_id = '$id'";
    $result = mysqli_query($conn,$sql);

    header("Location: clearance_progress.php");
}


?>