<?php
    include_once '../connection.php';

    if(isset($_POST['update'])){
    
    $signing_office_id = $_POST['signing_office_id'];
    $office_id = $_POST['office_id'];
    $clearance_progress_id  = $_POST['clearance_progress_id'];
    // $admin_id = $_POST['admin_id'];
    $clearance_type_id = $_POST['clearance_type_id'];

    $query = "SELECT * FROM admin WHERE office_id = '$office_id'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);

    $admin_id = $row['admin_id'];

    


    $sql = "UPDATE signing_office SET office_id = '$office_id',clearance_progress_id = '$clearance_progress_id',admin_id='$admin_id',clearance_type_id='$clearance_type_id' WHERE signing_office_id = $signing_office_id";

    $result= mysqli_query($conn,$sql);
    if($result){
        header("Location:signing_office.php");
    }else{
        echo "Error Updating";
    }
}

?>