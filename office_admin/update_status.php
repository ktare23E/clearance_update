<?php
    include_once '../connection.php';
    require ('phpmailer.php');

if(isset($_POST['approve'])){
        $clearance_type_id = $_POST['clearance_type_id'];
        $requirement_id = $_POST['requirement_id'];
        $signing_office_id = $_POST['signing_office_id'];
        $current_date = date('Y-m-d');
        $clearance_progress_id = $_POST['clearance_progress_id'];
        $student_id = $_POST['student_id'];
        $clearance_id = $_POST['clearance_id'];
        $cleared_date = date('F d Y, h:i:s A');
        $is_locked = "Yes";
        
        // echo $clearance_progress_id;
        // die();

        $sql = "UPDATE requirement SET is_complied = '1', date_cleared = '$current_date' WHERE requirement_id = $requirement_id AND signing_office_id = $signing_office_id";

        // echo $sql;
        $result= mysqli_query($conn,$sql);

        $updateQuery = 'SELECT * FROM requirement_view WHERE student_id = "'.$student_id.'"';
        $result4 = mysqli_query($conn,$updateQuery);
        $row4 = mysqli_fetch_assoc($result4);

        $email = $row4['student_email'];
        $requirement_details = $row4['requirement_details'];
        $office_name = $row4['office_name'];
        $semester = $row4['sem_name'];
        $school_year = $row4['school_year_and_sem'];

        sendEmail($email,"Approval of Requirements","You have been approved after passing $requirement_details of the $office_name requirements. Date of approve $cleared_date");


        $query = "SELECT * FROM requirement WHERE clearance_progress_id = $clearance_progress_id AND student_id = '$student_id' AND is_complied = 0";
        
        $result2 = mysqli_query($conn,$query);
        $num = mysqli_num_rows($result2);
    

        // echo $query;
        // echo $num;
        if(mysqli_num_rows($result2) < 1 ){
            $update = "UPDATE clearance SET clearance_status = '1', date_cleared = '$current_date', is_locked = '$is_locked' WHERE clearance_id = $clearance_id";
            $query2 = mysqli_query($conn,$update);

            $sql = "SELECT * FROM view_clearance WHERE student_id = '$student_id'";
            $result3 = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result3);

            $student_email = $row['student_email'];
            $clearance_type_name = $row['clearance_type_name'];
            $sem_name = $row['sem_name'];
            $school_year_and_sem = $row['school_year_and_sem'];
            $clearance = strtolower($clearance_type_name);

            sendEmail($student_email,"Clearance System Role Update","Your clearance for $clearance_type_name in $school_year_and_sem $sem_name is now cleared as of $cleared_date.");
        }
}

        if($result){
            header("Location:office_clearance_view.php?clearance_type_id=".$clearance_type_id."&clearance_progress_id=".$clearance_progress_id."&student_id=".$student_id."");
        }else{
            echo "Error Updating";
        }

?>