<?php
    include_once '../connection.php';

    if(isset($_POST['update'])){
    
    $admin_id = $_POST['admin_id'];
    $admin_name = $_POST['admin_name'];
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];
    $office_id = $_POST['office_id'];
    $user_type = $_POST['user_type'];
    $is_officer = $_POST['is_officer'];

    $sql = "UPDATE admin SET admin_name = '$admin_name',admin_username = '$admin_username',admin_password='$admin_password',office_id=$office_id,user_type='$user_type', is_officer = $is_officer WHERE admin_id = $admin_id";
    echo $sql;
    die();
    $result= mysqli_query($conn,$sql);
    
    if($result){
        header("Location:office_account.php");
    }else{
        echo "Error Updating";
    }
}

?>