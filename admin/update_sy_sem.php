<?php
    include_once '../connection.php';

    if(isset($_POST['update'])){
        
    $sy_sem_id = $_POST['sy_sem_id'];
    $school_year_and_sem = $_POST['school_year_and_sem'];
    


    $sql = "UPDATE sy_sem SET school_year_and_sem = '$school_year_and_sem' WHERE sy_sem_id = $sy_sem_id";

    $result= mysqli_query($conn,$sql);
    if($result){
        header("Location:sy_sem.php");
    }else{
        echo "Error Updating";
    }
}

?>