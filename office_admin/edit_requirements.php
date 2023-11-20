<?php
    include_once 'office_header.php';
    
    include_once '../connection.php';


    if(!isset($_GET['edit'])){
        echo "<h1>There's an error while viewing details.</h1>";
    }else{
        $id = $_GET['edit'];
        $sql = "SELECT * FROM requirement WHERE requirement_id = '$id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);

        $requirement_id = $row['requirement_id'];
        $requirement_details = $row['requirement_details'];
        
    }
?>