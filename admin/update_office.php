<?php
    include_once '../connection.php';

    if(isset($_POST['update'])){
    
    $office_id = $_POST['office_id'];
    $office_name = $_POST['office_name'];
    $office_email = $_POST['office_email'];
    $office_phone_number = $_POST['office_phone_number'];
    $office_description = $_POST['office_description'];
    $office_status = $_POST['office_status'];
    $is_department = $_POST['is_department'];
    


    $sql = "UPDATE office SET office_name = '$office_name', office_email = '$office_email', office_phone_number='$office_phone_number', office_description='$office_description', office_status='$office_status', is_department = $is_department WHERE office_id = $office_id ";

    $result= mysqli_query($conn,$sql);

    if($result){
        header("Location:office.php");
    }else{
        echo "Error Updating";
    }
}

?>