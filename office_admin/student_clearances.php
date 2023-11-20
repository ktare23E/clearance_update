<?php
    include_once 'office_header.php';


    include_once '../connection.php';

    if($conn->connect_error){
        echo $conn->connect_error;
    }
    
    if(!isset($_GET['student_id'])){
        echo "<h1>There's an error while viewing details.</h1>";
    }else{
        $student_id = $_GET['student_id'];
        $sql = "SELECT * FROM student_details WHERE student_id = '$student_id'";
        $students = $conn->query($sql) or die($conn->error);
        $row = $students->fetch_assoc();
    }

    $list_of_clearance = $db->result('view_clearance','student_id = "'.$student_id.'"');

    
    
?>

    <div class="office-container">
        <?php 
            include_once 'office_navtop.php'
        ?>
        
        <!-- ================ MAIN =================== -->
        <div class="office-main-container">
            <div class="first-div-container">
                <div>
                    <h3 style="font-size: 2rem;">Student Clearances</h3>
                </div>
            </div>

            <div class="table-container">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>School year and sem</th>
                                    <th>Clearance Type</th>
                                    <th>Status</th>
                                    <th>Remarks</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($list_of_clearance as $clearance):?>
                                <tr>
                                    <td><?= $clearance->school_year_and_sem." ".$clearance->sem_name; ?></td>
                                    <td><?= $clearance->clearance_type_name; ?></td>
                                    <td><?= $clearance->clearance_status ? 'Cleared' : 'Not Cleared';?></td>
                                    <td>Done</td>
                                    <td class="primary table-action-container">
                                    <a class="primary view-link" href="office_clearance_view.php?student_id=<?= $clearance->student_id?>&clearance_type_id=<?= $clearance->clearance_type_id; ?>&clearance_progress_id=<?= $clearance->clearance_progress_id; ?>">View Details</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                
        </div>
    </div>

    
    <script src="../assets/js/office_admin_index.js"></script> 

</body>
</html>
