<?php

// require ('../dbconnect.php');


// $signing_office_id    = $_POST['signing_office_id'];
// $sy_sem_id  = $_POST['sy_sem_id'];
// $clearance_type_id  = $_POST['clearance_type_id'];
// $student_id = $_POST['student_id'];
// $requirement_details = $_POST['requirement_details'];


// $data = array(
//     'signing_office_id' => $signing_office_id,
//     'sy_sem_id' => $sy_sem_id,
//     'clearance_type_id' => $clearance_type_id,
//     'student_id' => $student_id,
//     'requirement_details' => $requirement_details
// );

// $insert = $db->insert('requirement', $data);

// if ($db->affected_rows >= 0) {
//     header("location: office_requirements.php");
// } else {
//     echo 'Error inserting user account.';
// }

include_once 'office_header.php';

include_once '../connection.php';
mysqli_select_db($conn, 'clearance');



if(isset($_POST['submit'])){

    $is_department = $_SESSION['is_department'];
    $office_id = $_SESSION['office_id'];
    // $signing_office_id    = $_POST['signing_office_id'];
    $clearance_progress_id = $_POST['clearance_progress_id'];
    // $clearance_type_id  = $_POST['clearance_type_id'];
    $student_id = $_POST['student_id'];
    $requirement_details = $_POST['requirement_details'];

    $query2 = "SELECT * FROM clearance WHERE student_id = '".$student_id."' AND clearance_progress_id = " .$clearance_progress_id;
    $clearance = $conn->query($query2) or die($conn->error);
    $row = $clearance->fetch_assoc();
    $total = $clearance->num_rows;

    $clearance_type_id = $row['clearance_type_id'];
    
    
    $sql = "SELECT * FROM signing_office WHERE office_id = '$office_id' AND clearance_progress_id = '$clearance_progress_id' AND clearance_type_id = '$clearance_type_id'";
    $singing_office = $conn->query($sql) or die($conn->error);

    if($singing_office->num_rows < 1){
        
        echo "<a href='office_requirements.php'>Back</a><br>";
        echo "You are not signing office for these semester and school year and clearance type that you selected.";
        die();
    }

    $row2 = $singing_office->fetch_assoc();
    $signing_office_id = $row2['signing_office_id'];
    
    if($is_department == 1){
        $sql2 = "SELECT * FROM student WHERE student_id = '".$student_id."' AND office_id = '$office_id'";
        $is_ok = $conn->query($sql2) or die($conn->error);

        if($is_ok->num_rows < 1){
            echo "<a href='office_requirements.php'>Back</a><br>";
            echo "You cannot send a requirements to this student '".$student_id."' who are not under in your department.";
            die();
        }
    }

    $sql3 = "SELECT * FROM clearance WHERE student_id = '".$student_id."' AND clearance_progress_id = " .$clearance_progress_id . " AND clearance_type_id = " .$clearance_type_id;
    $clearance_exist = $conn->query($sql3) or die($conn->error);

    if($clearance_exist->num_rows < 1){
        echo "<a href='office_requirements.php'>Back</a><br>";
        echo "This student '".$student_id."' has no clearance for these school year and semester and clearance type that you've been selected.";
        die();
    }

    // echo $query2;
    // echo print_r($row);
    if($total < 1){
        header("location: office_requirements.php");
        die();
        echo "This student has no clearance for this semester.";
    }

    // Get the clearance_id and clearance_status values from the form
    $clearance_status = $_POST['clearance_status'];
    
    // Update the clearance_status field in the clearance table
    $updateQuery = "UPDATE clearance SET clearance_status = '".$clearance_status."' WHERE clearance_id = ".$row['clearance_id'];
    mysqli_query($conn, $updateQuery);

    // echo $updateQuery;
    
    // Insert a new requirement into the requirement table
    $insertQuery = "INSERT INTO requirement (signing_office_id, clearance_progress_id, clearance_type_id, student_id, requirement_details)
                    VALUES ('$signing_office_id', '$clearance_progress_id','$clearance_type_id', '$student_id', '$requirement_details')";
    mysqli_query($conn, $insertQuery);
    
    if(mysqli_query($conn, $updateQuery)){
        header("location: office_requirements.php");
    } else {
        echo 'Error inserting user account.';
    }
    
}

?>