<?php
    include_once 'connection.php';


    
    $requirement_details = $_POST['requirement_details'];
    $old_requirement = $_POST['old_requirement'];
    
    $updateRequirementQuery = "UPDATE requirement SET requirement_details = '$requirement_details' WHERE requirement_details = '$old_requirement'";


    $updateRequirementResult = mysqli_query($conn, $updateRequirementQuery);

    echo 'success';

?>