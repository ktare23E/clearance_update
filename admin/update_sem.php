<?php
    include_once '../connection.php';
    
    if(isset($_POST['update'])){
    
    $sem_id = $_POST['sem_id'];
    $sem_name = $_POST['sem_name'];
    


    $sql = "UPDATE sem SET sem_name = '$sem_name'WHERE sem_id = $sem_id";

    $result= mysqli_query($conn,$sql);
    if($result){
        header("Location:semester.php");
    }else{
        echo "Error Updating";
    }
}

?>