<?php
    require ('phpmailer.php');
    require ('../dbconnect.php');

    session_start();
    if (!isset($_SESSION['isOffice'])) {
        header("location: ../index.php");
        exit();
    }

    include_once '../connection.php';

    $is_department = $_SESSION['is_department'];
    $office_id = $_SESSION['office_id'];

    $list_clearance_id = $_POST['list_clearance_id'];
    $clearance_progress_id = $_POST['clearance_progress_id'];
    $clearance_status = $_POST['clearance_status'];

    $current_date = date('Y-m-d');
    $requirement_details = $_POST['requirement_details'];
    $requirement_details2 = $_POST['requirement_details2'];
    $requirement_details3 = $_POST['requirement_details3'];

    $emails = array();
    $messages = array();

    $success_counter = 0;
    $fail_counter = 0;

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
                    );

                    $insert = $db->insert('requirement', $data);

                    $sql = "SELECT * FROM requirement_view WHERE student_id = '$student_id' AND clearance_progress_id = '$clearance_progress_id' AND clearance_type_id = '$clearance_type_id'";
                    $result = mysqli_query($conn, $sql);
                    $row3 = mysqli_fetch_assoc($result);

                    $office_name = $row3['office_name'];
                    $student_email = $row3['student_email'];
                    $school_year_and_sem = $row3['school_year_and_sem'];
                    $sem_name = $row3['sem_name'];

                    array_push($emails, $student_email);
                    array_push($messages, "You need to submit the following requirements: $requirement_details, $requirement_details2, $requirement_details3 to $office_name.");
                }

                if(!empty($requirement_details2)) {
                    $data2 = array(
                        'student_id' => $student_id,
                        'clearance_progress_id' => $clearance_progress_id,
                        'clearance_type_id' => $clearance_type_id,
                        'requirement_details' => $requirement_details2,
                        'signing_office_id' => $signing_office_id,
                    );
                    $insert = $db->insert('requirement', $data2);

                    if(empty($requirement_details) && empty($requirement_details3)) {
                        $sql = "SELECT * FROM requirement_view WHERE student_id = '$student_id' AND clearance_progress_id = '$clearance_progress_id' AND clearance_type_id = '$clearance_type_id'";
                        $result = mysqli_query($conn, $sql);
                        $row3 = mysqli_fetch_assoc($result);

                        $office_name = $row3['office_name'];
                        $student_email = $row3['student_email'];
                        $school_year_and_sem = $row3['school_year_and_sem'];
                        $sem_name = $row3['sem_name'];

                        array_push($emails, $student_email);
                        array_push($messages, "You need to submit the following requirements: $requirement_details, $requirement_details2, $requirement_details3 to $office_name.");
                    }
                }

                if(!empty($requirement_details3)) {
                    $data3 = array(
                        'student_id' => $student_id,
                        'clearance_progress_id' => $clearance_progress_id,
                        'clearance_type_id' => $clearance_type_id,
                        'requirement_details' => $requirement_details3,
                        'signing_office_id' => $signing_office_id,
                    );
                    $insert = $db->insert('requirement', $data3);

                    if(empty($requirement_details) && empty($requirement_details2)) {
                        $sql = "SELECT * FROM requirement_view WHERE student_id = '$student_id' AND clearance_progress_id = '$clearance_progress_id' AND clearance_type_id = '$clearance_type_id'";
                        $result = mysqli_query($conn, $sql);
                        $row3 = mysqli_fetch_assoc($result);

                        $office_name = $row3['office_name'];
                        $student_email = $row3['student_email'];
                        $school_year_and_sem = $row3['school_year_and_sem'];
                        $sem_name = $row3['sem_name'];

                        array_push($emails, $student_email);
                        array_push($messages, "You need to submit the following requirements: $requirement_details, $requirement_details2, $requirement_details3 to $office_name.");
                    }
                }
            }

            $success_counter += 1;
        } else {
            $fail_counter += 1;
        }
    }

    echo $success_counter;

    // Insert emails and messages into the email table
    for($i = 0; $i < count($emails); $i++) {
        $email = $emails[$i];
        $message = $messages[$i];

        $insertQuery = "INSERT INTO email (email, message) VALUES ('$email', '$message')";
        mysqli_query($conn, $insertQuery);
    }

    // Define the chunk size
    $chunk_size = 100;

    // Loop through the $emails array in chunks
    for ($i = 0; $i < count($emails); $i += $chunk_size) {
        // Get a subset of the $emails array
        $email_chunk = array_slice($emails, $i, $chunk_size);

        // Send the emails in the current chunk
        sendEmail($email_chunk, "Online Clearance System", $message);
    }
?>
