<?php 
    include_once '../connection.php';
    $student_id = $_POST['student_id']; 
    $requirement_details = $_POST['requirement_details'];

    $deleteStudentFromRequirementQuery = "DELETE FROM requirement WHERE student_id = '$student_id' AND requirement_details = '$requirement_details'";
    $deleteStudentFromRequirement = mysqli_query($conn,$deleteStudentFromRequirementQuery);

    echo "Requirement removed from student successfully!";
?>