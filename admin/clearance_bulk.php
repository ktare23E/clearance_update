<?php
    
    require ('../dbconnect.php');
    require ('phpmailer.php');
    include_once '../connection.php';


    $list_student_id = $_POST['list_student_id'];
    $clearance_progress_id = $_POST['clearance_progress_id'];
    $clearance_type_id = $_POST['clearance_type_id'];
    $clearance_status = $_POST['clearance_status'];
    $current_date = date('Y-m-d');
    $is_locked = "No";

    $emails  = array();

    foreach($list_student_id as $i => $student_id){

        $sql = "SELECT * FROM student WHERE student_id = '".$student_id."'";
        $result= mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);


        $office_id = $row['office_id'];
        $course_id = $row['course_id'];

        $query = "SELECT * FROM clearance WHERE student_id = '".$student_id."' AND clearance_progress_id = $clearance_progress_id";
        $clearance_exist = $conn->query($query) or die($conn->error);
        $row5 = mysqli_fetch_assoc($clearance_exist);

        $clearance_type_id2 = $row5['clearance_type_id'];

        if($clearance_exist->num_rows > 0){
            // echo '<script>alert(This student has already have a clearance.)</script>';

            $query2 = "UPDATE clearance SET clearance_type_id = $clearance_type_id WHERE student_id = '$student_id' AND clearance_progress_id = $clearance_progress_id AND clearance_type_id = $clearance_type_id2";
            $update = $conn->query($query2) or die($conn->error);

            // print_r($update);

            // echo "existed";
            // die();
            // echo 'existed';
        }else{
            // insert clearance
            $data = array(
                'student_id' => $student_id,
                'clearance_progress_id' => $clearance_progress_id,
                'course_id' => $course_id,
                'office_id' => $office_id,
                'clearance_type_id'=> $clearance_type_id,
                'date_created' => $current_date,
                'clearance_status' => $clearance_status,
                'is_locked' => $is_locked
            );
            
            
            $insert = $db->insert('clearance', $data);
    
            $sql1 = "SELECT * FROM view_clearance WHERE student_id = '$student_id' AND clearance_progress_id = $clearance_progress_id AND clearance_type_id = $clearance_type_id";
            $result1 = mysqli_query($conn,$sql1);
            $row1 = mysqli_fetch_assoc($result1);
    
            $student_email = $row1['student_email'];
            $clearance_type_name = $row1['clearance_type_name'];
            $sem_name = $row1['sem_name'];
            $school_year_and_sem = $row1['school_year_and_sem'];
            $clearance = strtolower($clearance_type_name);
    
    
            array_push($emails,$student_email);
        }

        // $sql = "UPDATE student SET student_status = '$status' WHERE student_id = '$student_id'";
    }

    // Define the chunk size
    $chunk_size = 100;



    // Loop through the $emails array in chunks
    for ($i = 0; $i < count($emails); $i += $chunk_size) {
        // Get a subset of the $emails array
        $email_chunk = array_slice($emails, $i, $chunk_size);

        // Send the emails in the current chunk
        sendEmail($email_chunk, "Online Clearance System", "Your clearance for $school_year_and_sem $sem_name is now created please view your account to see the requirements of each signing offices. This is for testing purposes.");
    }

    // sendEmail($emails,"Online Clearance System","Your clearance for $school_year_and_sem $sem_name is now created please view your account to see the requirements of each signing offices. This is for testing purposes.");


?>