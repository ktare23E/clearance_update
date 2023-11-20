<?php
    include_once 'office_header.php';
    
    include_once '../connection.php';

    if($conn->connect_error){
        echo $conn->connect_error;
    }
    
    if(!isset($_GET['clearance_progress_id']) && !isset($_GET['clearance_type_id']) && !isset($_GET['student_id'])){
        echo "<h1>There's an error while viewing details.</h1>";
    }else{
        $clearance_type_id = $_GET['clearance_type_id'];
        $clearance_progress_id = $_GET['clearance_progress_id'];
        $student_id = $_GET['student_id'];

        $sql = "SELECT * FROM view_clearance WHERE clearance_type_id = '$clearance_type_id' AND clearance_progress_id = '$clearance_progress_id' AND student_id = '$student_id'";
        $students = $conn->query($sql) or die($conn->error);
        $row = $students->fetch_assoc();

        $status = $row['status'];
    }

    $signing_office_id = null;
?>
<div class="office-container">
        <!-- sidebar -->
        <?php 
            include_once 'office_navtop.php'
        ?>

        <div class="form-and-table-container">
            <a href="office_clearance.php" style="
            display:inline-block;
            background-color:var(--color-primary-variant);
            width:fit-content;
            padding: 6px 20px;
            color:white;
            border-radius: var(--border-radius-1);
            margin-bottom: 5px; 
            display:flex;
            align-items:center;
            font-size: 1rem;
            ">
                <span class="material-symbols-sharp" style="font-size: 1rem;">arrow_back_ios</span>
                Back
            </a>
            
            <div class="clearance-detail-container">
                <div class="clearance-detail-left">
                    <div class="detail-left-header-title">
                        <div>
                            <h2>Clearance information</h2>
                        </div>
                        <div class="status-title">
                            <h4>Status:</h4>
                            <h3 class="overall-clearance-cleared"><?= $row['clearance_status'] ? 'Cleared' : 'Not Cleared';?></h3>
                        </div>
                    </div>
                    <div class="detail-left-main-content">
                        
                            <div class="clearance-info-container">
                                <h3>Owner</h3>
                                <h4><?= $row['student_first_name'].' '.$row['student_last_name'];?></h4>
                            </div>
                            <div class="clearance-info-container">
                                <h3>Course and Year</h3>
                                <h4><?= $row['course_name'].'-'.$row['student_year']; ?></h4>
                            </div>
                            <div class="clearance-info-container">
                                <h3>Department</h3>
                                <h4><?= $row['office_name']; ?></h4>
                            </div>
                            <div class="clearance-info-container">
                                <h3>Clearance type</h3>
                                <h4><?= $row['clearance_type_name']; ?></h4>
                            </div>
                            <div class="clearance-info-container">
                                <h3>Date created</h3>
                                <h4><?= $row['date_created'];?></h4>
                            </div>
                            <div class="clearance-info-container">
                                <h3>School year -  sem</h3>
                                <h4><?= $row['school_year_and_sem'].' '.$row['sem_name'];?></h4>
                            </div>
                            <div class="clearance-info-container">
                                <h3>Date Cleared</h3>
                                <h4 class="success"><?= $row['date_cleared'];?></h4>
                            </div>
                        
                    </div>
                </div>

                <div class="clearance-detail-right">
                    <div class="clearance-detail-right-title">
                        <h2>Signing office status</h2>
                    </div>
                    <div class="clearance-detail-right-main-content">
                        <table>
                                
                            <thead>
                                    <th>Signing office</th>
                                    <th>Requirement</th>
                                    <th>Status</th>
                                    <th>Date Cleared</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  $users = $db->result('requirement_view', 'clearance_progress_id = '.$clearance_progress_id.' AND student_id = "'.$student_id.'"'); ?>
                                <?php foreach($users as $user):?>
                                    <?php $signing_office_id = ($user->office_id == $_SESSION['office_id'])?$user->signing_office_id:null ?>
                                    <tr>
                                        <td><?= $user->office_name; ?></td>
                                        <td><?= $user->requirement_details;?></td>
                                        <td class="overall-clearance-status"><?= $user->is_complied ? 'Cleared' : 'Not Cleared'; ?></td>
                                        <td><?= $user->date_cleared; ?></td>
                                        <td>
                                        <?php if($signing_office_id != null): ?>
                                            <form action="update_status.php" method="POST">
                                                <input type="hidden" name="requirement_id" value="<?= $user->requirement_id; ?>"> 
                                                <input type="hidden" name="signing_office_id" value="<?= $user->signing_office_id; ?>">
                                                <input type="hidden" name="clearance_type_id" value="<?= $user->clearance_type_id; ?>">
                                                <input type="hidden" name="clearance_progress_id" value="<?= $user->clearance_progress_id; ?>">
                                                <input type="hidden" name="student_id" value="<?= $user->student_id; ?>">
                                                <input type="hidden" name="clearance_id" value="<?= $row['clearance_id']; ?>">
                                                <?php if($status == "Inactive") :?>
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
    </div>
        

    
    <!-- <script src="../assets/js/student-info.js"></script> -->
    
    <script defer src="../assets/js//modal.js"></script>
    <script src="../assets/js/office_admin_index.js"></script>
    <script defer src="../assets/js/active.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="../assets/js/update.js"></script> -->

    <script>
        $(document).ready(function () {

            $("#show-clearance-insights").click(function(){
                $("#clearance-insights").slideToggle()
            })
            


            
        });


    </script>
</body>
</html>
