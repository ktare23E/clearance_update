<?php
    include_once '../connection.php';

    if(isset($_POST['update'])){
        
    $clearance_type_id = $_POST['clearance_type_id'];
    $clearance_type_name = $_POST['clearance_type_name'];
    $clearance_type_description = $_POST['clearance_type_description'];


    $sql = "UPDATE clearance_type SET clearance_type_name = '$clearance_type_name',clearance_type_description = '$clearance_type_description' WHERE clearance_type_id = $clearance_type_id";

    $result= mysqli_query($conn,$sql);
    if($result){
        header("Location:clearance_type.php");
    }else{
        echo "Error Updating";
    }
}

?>