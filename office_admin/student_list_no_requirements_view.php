<?php
include_once '../connection.php';
include_once 'office_header.php';


if (!isset($_GET['requirement_details'])) {
    echo "<h1>There's an error while viewing details.</h1>";
} else {
    $requirement_details = $_GET['requirement_details'];

    // $sql = "SELECT * FROM requirement_view WHERE requirement_details ='".$requirement_details."'";
    // $required_students = $conn->query($sql) or die($conn->error);
    // $row = $required_students->fetch_assoc();

    $studentNoRequirementsQuery = "SELECT * FROM view_clearance WHERE student_id NOT IN (SELECT student_id FROM requirement WHERE requirement_details = '$requirement_details')";
    $runStudentNoRequirementsQuery = mysqli_query($conn, $studentNoRequirementsQuery);
    $rowStudentNoRequirementsQuery = mysqli_fetch_assoc($runStudentNoRequirementsQuery);
}


?>
<div class="office-container">
    <?php
    include_once 'office_navtop.php'
    ?>

    <!-- ================ MAIN =================== -->
    <div class="main-requirements-container">
        <div class="first-main-content-container">
            <div class="forms">
                <span class="title">
                    <h2>List of Students who doesn't a <?= $requirement_details;?> requirement yet:</h2>
                </span>
                <br>
                <table id="required-students" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rowStudentNoRequirementsQuery as $noRequirementStudents) : ?>
                            <?php $signing_office_id = ($required_student->office_id == $_SESSION['office_id'])?$required_student->signing_office_id:null ?>
                            <?php 
                                $query = "SELECT * FROM view_clearance WHERE clearance_type_id = ".$required_student->clearance_type_id." AND clearance_progress_id =".$required_student->clearance_progress_id." AND student_id = '$required_student->student_id'";
                                $result = mysqli_query($conn,$query);
                                $row = mysqli_fetch_assoc($result);

                                // print_r($row);
                                // die();

                                $clearance_id = $row['clearance_id'];
                            ?>
                            <tr>
                                <td><?= $required_student->student_id; ?></td>
                                <td><?= $required_student->student_first_name; ?></td>
                                <td><?= $required_student->student_last_name ?></td>
                                <td class="overall-clearance-status"><?= $required_student->is_complied ? 'Cleared' : 'Not Cleared'; ?></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="../assets/js/office_admin_index.js"></script>

<script>
    $(document).ready(function() {
        $('#required-students').DataTable();
    });
</script>

</body>

</html>