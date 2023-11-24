<?php 
    include_once '../connection.php';

    $list_student_id = $_POST['list_student_id'];
    $requirement_details = $_POST['requirement_details'];
    $clearance_progress_id = $_POST['clearance_progress_id'];

    foreach($list_student_id  as  $i => $student_id) {
        $deleteStudentFromRequirementQuery = "DELETE FROM requirement WHERE student_id = '$student_id' AND requirement_details = '$requirement_details' AND clearance_progress_id = '$clearance_progress_id'";
        $deleteStudentFromRequirement = mysqli_query($conn,$deleteStudentFromRequirementQuery);
    }

    echo "Requirement removed from student successfully!";
?>