<?php
    require ('phpmailer.php');
    session_start();
    if (!isset($_SESSION['isOffice'])) {
        header("location: ../index.php");
        exit();
    }

    include_once '../connection.php';

    // from POST
    $list_student_id = $_POST['list_student_id'];
    $requirement_details = $_POST['requirement_details'];
    $clearance_progress_id = $_POST['clearance_progress_id'];
    // hard code
    $current_date = date('Y-m-d');
    $cleared_date = date('F d Y, h:i:s A');
    $is_locked = "Yes";

    // $emails = array();
    // $messages = array();

    // $success_counter = 0;
    // $fail_counter = 0;

    foreach($list_student_id as $i => $student_id) {
        //bulk update
        $bulkUpdateRequirement = "UPDATE requirement SET is_complied = '1', date_cleared = '$current_date' WHERE requirement_details  = '$requirement_details' AND student_id = '$student_id' AND clearance_progress_id = $clearance_progress_id";
        $runBulkUpdateRequirement = mysqli_query($conn, $bulkUpdateRequirement);

        //retrieve all requirements if done na tanan
        $retrieveStudentRequirement = "SELECT * FROM requirement WHERE clearance_progress_id = $clearance_progress_id AND student_id = '$student_id' AND is_complied = 0";
        $runRetrieveStudentRequirement = mysqli_query($conn, $retrieveStudentRequirement);

        if(mysqli_num_rows($runRetrieveStudentRequirement) < 1 ){
            $bulkUpdateClearance = "UPDATE clearance SET clearance_status = '1', date_cleared='$current_date' WHERE clearance_progress_id = $clearance_progress_id AND student_id = '$student_id'";
            $runBulkUpdateClearance = mysqli_query($conn, $bulkUpdateClearance);
        }else{
            echo mysqli_error($conn);
        }
    }

    echo 'Bulk Approve Successfully!';

    // // Insert emails and messages into the email table
    // for($i = 0; $i < count($emails); $i++) {
    //     $email = $emails[$i];
    //     $message = $messages[$i];

    //     $insertQuery = "INSERT INTO email (email, message) VALUES ('$email', '$message')";
    //     mysqli_query($conn, $insertQuery);
    // }

    // // Define the chunk size
    // $chunk_size = 100;

    // // Loop through the $emails array in chunks
    // for ($i = 0; $i < count($emails); $i += $chunk_size) {
    //     // Get a subset of the $emails array
    //     $email_chunk = array_slice($emails, $i, $chunk_size);

    //     // Send the emails in the current chunk
    //     sendEmail($email_chunk, "Online Clearance System", $message);
    // }
?>
