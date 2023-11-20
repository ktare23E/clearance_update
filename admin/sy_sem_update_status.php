<?php

    include_once '../connection.php';

    
    $list_sy_sem_id = $_POST['list_sy_sem_id'];
    $status = $_POST['status'];

    foreach($list_sy_sem_id as $i => $sy_sem_id){

        $sql = "UPDATE sy_sem SET status = '$status' WHERE sy_sem_id = '$sy_sem_id'";

        $result= mysqli_query($conn,$sql);
        if($result){
            echo "success";
        }else{
            echo "Error";
        }
    }
?>