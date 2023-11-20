<?php

include_once '../connection.php';

session_start();

$is_department = $_SESSION['is_department'];

if(isset($_POST['import'])){
    $fileName = $_FILES['file']['tmp_name'];

    if($_FILES['file']['size'] > 0){
        $file = fopen($fileName, "r");

        while(($column = fgetcsv($file,1000,",")) !== FALSE){

            try{

                $office_id = $_SESSION['office_id'];
                $clearance_progress_id = $_POST['clearance_progress_id'];

                // echo $clearance_progress_id;
                // die();

                $query2 = "SELECT * FROM view_clearance WHERE student_id = '".$column[1]."' AND clearance_progress_id = $clearance_progress_id";
                $clearance = $conn->query($query2) or die($conn->error);
                $row = $clearance->fetch_assoc();


                if($clearance->num_rows < 1){
                    echo "This student " .$column[1]. " doesn't have a clearance yet for this semester and school year that you selected.</br>";
                    die();
                }
                $school_year_and_sem = $row['school_year_and_sem'];
                $sem_name = $row['sem_name'];
                $clearance_id = $row['clearance_id'];
                $clearance_type_id = $row['clearance_type_id'];
                
                $sql = "SELECT * FROM signing_office WHERE office_id = '$office_id' AND clearance_progress_id = '$clearance_progress_id'";
                $singing_office = $conn->query($sql) or die($conn->error);
            
                if($singing_office->num_rows < 1){
                    echo "You are not signing office for these semester and school year that you selected.";
                    die();
                }
            
                $row2 = $singing_office->fetch_assoc();
                $signing_office_id = $row2['signing_office_id'];

                $sql3 = "SELECT * FROM clearance WHERE student_id = '".$column[1]."' AND clearance_progress_id = " .$clearance_progress_id . "";
                $clearance_exist = $conn->query($sql3) or die($conn->error);
                
                if($clearance_exist->num_rows < 1){
                    echo "This student '".$column[1]."' has no clearance for these school year and semester and clearance type that you've been selected.";
                }
            
                $sqlUpdate = "UPDATE clearance SET clearance_status = '0' WHERE clearance_id = $clearance_id AND clearance_progress_id = $clearance_progress_id";
                $update = $conn->query($sqlUpdate);

                $sqlView = "SELECT * FROM signing_office WHERE office_id = $office_id";
                $signing_office = $conn->query($sqlView) or die($conn->error);
                $row3 = $signing_office->fetch_assoc();

                $signing_office_id = $row3['signing_office_id'];
                
                if($is_department == 1){
                    $sql2 = "SELECT * FROM student WHERE student_id = '".$column[1]."' AND office_id = '$office_id'";
                    $is_ok = $conn->query($sql2) or die($conn->error);
            
                    if($is_ok->num_rows < 1){
                        echo "<a href='office_requirements.php'>Back</a><br>";
                        echo "You cannot send a requirements to this student '".$column[1]."' who are not under in your department.";
                        die();
                    }
                }
                // Check if the requirement already exists in the database


                    $sqlCheck = "SELECT * FROM requirement WHERE requirement_details = '".$column[0]."' AND student_id = '".$column[1]."' AND clearance_type_id = '".$clearance_type_id."' AND signing_office_id = '".$signing_office_id."' AND clearance_progress_id = '".$clearance_progress_id."'";
                    $resultCheck = mysqli_query($conn, $sqlCheck);


                // if($resultCheck->num_rows > 0){
                // // If requirement exists, update the requirement details
                //     $sqlUpdateReq = "UPDATE requirement SET requirement_details = '".addslashes($column[0])."' WHERE requirement_details = '".$column[0]."' AND student_id = '".$column[1]."' AND clearance_type_id = '".$clearance_type_id."' AND signing_office_id = '".$signing_office_id."' AND clearance_progress_id = '".$clearance_progress_id."'";
                //     $resultUpdateReq = mysqli_query($conn, $sqlUpdateReq);
                //     if(!$resultUpdateReq){
                //     echo "Error updating requirement: " . mysqli_error($conn);
                //     die();
                // }
                //}
                //  else {
                // If requirement does not exist, insert new requirement
                    $sqlInsert = "INSERT INTO requirement (requirement_details, student_id, clearance_type_id, signing_office_id, clearance_progress_id) VALUES ('".addslashes($column[0])."','".addslashes($column[1])."',$clearance_type_id,$signing_office_id,$clearance_progress_id)";
                    $resultInsert = mysqli_query($conn, $sqlInsert);
                    if(!$resultInsert){
                        echo "Error inserting requirement: " . mysqli_error($conn);
                        die();
                    }
                // }

                // if(mysqli_affected_rows($conn) > 0){
                // header("Location:office_requirements.php");
                // } else {
                // echo '<a href="office_requirements.php">Back</a><br>';
                // echo "This requirement $column[0] already exists for this student $column[1]";
                // die();
                // }
            } catch(Exception $e){
                echo "Error: " . $e->getMessage();
            }

        }
    }
}

?>