<?php
    // require ('phpmailer.php');
    require ('../dbconnect.php');

    session_start();
    if (!isset($_SESSION['isOffice'])) {
        header("location: ../index.php");
        exit();
    }

    include_once '../connection.php';

    $is_department = $_SESSION['is_department'];
    $office_id = $_SESSION['office_id'];
    $officer_requirement = $_SESSION['is_officer'];

    //from AJAX
    $list_clearance_id = $_POST['list_clearance_id'];
    $clearance_progress_id = $_POST['clearance_progress_id'];
    $requirement_details = $_POST['requirement_details'];
    $clearance_status = $_POST['clearance_status'];

    

    foreach($list_clearance_id as $i => $clearance_id) {
        $query2 = "SELECT * FROM clearance WHERE clearance_id = '".$clearance_id."';";
        $result_clearance = mysqli_query($conn, $query2);
        $row = mysqli_fetch_assoc($result_clearance);

        $clearance_type_id = $row['clearance_type_id'];
        $student_id = $row['student_id'];

        if($clearance_progress_id == $row['clearance_progress_id']) {
            $sql = "SELECT * FROM signing_office WHERE office_id = '$office_id' AND clearance_progress_id = '$clearance_progress_id' AND clearance_type_id = '$clearance_type_id'";
            $signing_office_result = mysqli_query($conn, $sql);
            $row_signing_office = mysqli_fetch_assoc($signing_office_result);

            if($row_signing_office) {
                $signing_office_id = $row_signing_office['signing_office_id'];

                // Update the clearance_status field in the clearance table
                $updateQuery = "UPDATE clearance SET clearance_status = '".$clearance_status."' WHERE clearance_id = '".$clearance_id."';";
                mysqli_query($conn, $updateQuery);

                if(!empty($requirement_details)) {
                    $data = array(
                        'student_id' => $student_id,
                        'clearance_progress_id' => $clearance_progress_id,
                        'clearance_type_id' => $clearance_type_id,
                        'requirement_details' => $requirement_details,
                        'signing_office_id' => $signing_office_id,
                        'officer_requirement' => $officer_requirement
                    );

                    $insert = $db->insert('requirement', $data);

                }
            }
        } 
    }

    echo 'Successfully requirement sent!';

?>
