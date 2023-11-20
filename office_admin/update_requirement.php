<?php
    include_once '../connection.php';

if(isset($_POST['update'])){
    
    $clearance_id = $_POST['clearance_id'];
    $clearance_progress_id = $_POST['clearance_progress_id'];
    $clearance_type_id = $_POST['clearance_type_id'];
    $requirement_details = $_POST['requirement_details'];
    $requirement_id = $_POST['requirement_id'];
    $clearance_status = $_POST['clearance_status'];
    $student_id = $_POST['student_id'];
    


    $sql = "UPDATE requirement SET clearance_progress_id = '$clearance_progress_id', student_id = '".$student_id."', requirement_details = '$requirement_details', clearance_type_id = '$clearance_type_id' WHERE requirement_id = $requirement_id";

    $sql3 = "SELECT * FROM clearance WHERE student_id = '".$student_id."' AND clearance_progress_id = " .$clearance_progress_id . " AND clearance_type_id = " .$clearance_type_id;
    $clearance_exist = $conn->query($sql3) or die($conn->error);

    if($clearance_exist->num_rows < 1){
        echo "<a href='office_requirements.php'>Back</a><br>";
        echo "This student '".$student_id."' has no clearance for this clearance period and clearance type that you've been selected.";
        die();
    }

    $query2 = "SELECT * FROM clearance WHERE student_id = '".$student_id."' AND clearance_progress_id = " .$clearance_progress_id;
    $clearance = $conn->query($query2) or die($conn->error);
    $row = $clearance->fetch_assoc();
    $total = $clearance->num_rows;


    $updateQuery = "UPDATE clearance SET clearance_status = '".$clearance_status."' WHERE clearance_id = ".$row['clearance_id'];
    mysqli_query($conn, $updateQuery);
    
    $result= mysqli_query($conn,$sql);
    if($result){
        header("Location:office_requirements.php");
    }else{
        echo "Error Updating";
    }
}

?>