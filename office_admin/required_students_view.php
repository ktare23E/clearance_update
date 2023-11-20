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

    $required_students = $db->query("SELECT * FROM requirement_view WHERE requirement_details = $requirement_details") ;
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
                    <h2>List of Students required by this requirement: <?php echo $requirement_details ?></h2>
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
                        <?php foreach ($required_students as $required_student) : ?>
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
                                <td>
                                        <?php if($signing_office_id != null): ?>
                                            <form action="update_status_required_student.php" method="POST">
                                                <input type="hidden" name="requirement_id" value="<?= $required_student->requirement_id; ?>"> 
                                                <input type="hidden" name="signing_office_id" value="<?= $required_student->signing_office_id; ?>">
                                                <input type="hidden" name="clearance_type_id" value="<?= $required_student->clearance_type_id; ?>">
                                                <input type="hidden" name="clearance_progress_id" value="<?= $required_student->clearance_progress_id; ?>">
                                                <input type="hidden" name="student_id" value="<?= $required_student->student_id; ?>">
                                                <input type="hidden" name="requirement_details" value="<?= $requirement_details; ?>">
                                                <input type="hidden" name="clearance_id" value="<?= $clearance_id; ?>">
                                                <?php if($required_student-> status == "Inactive") :?>
                                                    <button type="submit" name="approve" class="view-link" value="Get Current Date">Cleared</button>
                                                <?php endif; ?>
                                            </form>
                                        <?php endif; ?>
                                        </td>
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