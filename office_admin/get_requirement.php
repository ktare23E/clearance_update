<?php 
    include_once 'connection.php';
    session_start();

    $requirement_details = $_POST['requirement_details'];

    $getRequirementQuery = "SELECT * FROM requirement_view WHERE requirement_details = '$requirement_details' AND office_id = " . $_SESSION['office_id'] . "";
    $getRequirementResult = mysqli_query($conn, $getRequirementQuery);

    $requirements = [];

    if(mysqli_num_rows($getRequirementResult) > 0 ){
        while($getRequirementRow = mysqli_fetch_assoc($getRequirementResult)){
            $requirements[] = $getRequirementRow;
        }
    }

    echo "kuha na";

?>