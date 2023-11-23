<?php
include_once '../connection.php';
include_once 'office_header.php';


if (!isset($_GET['requirement_details'])) {
    echo "<h1>There's an error while viewing details.</h1>";
} else {
    $requirement_details = $_GET['requirement_details'];
    $clearance_progress_id = $_GET['clearance_progress_id'];
    $is_department = $_SESSION['is_department'];

    if ($is_department == 0) {
        $studentNoRequirementsQuery = "SELECT * FROM view_clearance WHERE student_id NOT IN (SELECT student_id FROM requirement WHERE requirement_details = '$requirement_details') AND clearance_progress_id = $clearance_progress_id";
        $runStudentNoRequirementsQuery = mysqli_query($conn, $studentNoRequirementsQuery);
        $students = [];
        if(mysqli_num_rows($runStudentNoRequirementsQuery) > 0){
            while($rowStudentNoRequirementsQuery = mysqli_fetch_assoc($runStudentNoRequirementsQuery)){
                $students[] = $rowStudentNoRequirementsQuery;
            }
        }
    } else {
        $office_id = $_SESSION['office_id'];
        $studentNoRequirementsQuery = "SELECT * FROM view_clearance WHERE student_id NOT IN (SELECT student_id FROM requirement WHERE requirement_details = '$requirement_details') AND office_id = $office_id AND clearance_progress_id = $clearance_progress_id";
        // echo $studentNoRequirementsQuery;
        // die();
        $runStudentNoRequirementsQuery = mysqli_query($conn, $studentNoRequirementsQuery);
        $students = [];
        if(mysqli_num_rows($runStudentNoRequirementsQuery) > 0){
            while($rowStudentNoRequirementsQuery = mysqli_fetch_assoc($runStudentNoRequirementsQuery)){
                $students[] = $rowStudentNoRequirementsQuery;
            }
        }

        // var_dump($students);
        // die();
    }

    // }
    // $studentNoRequirementsQuery = $db->query("SELECT * FROM view_clearance WHERE student_id NOT IN (SELECT student_id FROM requirement WHERE requirement_details = '$requirement_details')");
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
                    <p>List of Students who doesn't have a <b><?= $requirement_details;?></b> requirement yet:</p>
                </span>
                <br>
                <table id="required-students" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Firstname</th>
                            <th>Lastname</th>

                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $student) : ?>
                            <tr>
                                <td><?= $student['student_id']; ?></td>
                                <td><?= $student['student_first_name']; ?></td>
                                <td><?= $student['student_last_name'] ?></td>
                             
                                <td></td>
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