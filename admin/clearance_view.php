<?php
    include_once 'header.php';
    // $users = $db->result('student');

    
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
    }
?>

<div class="container-student">
        <!-- sidebar -->
        <?php 
                include_once 'aside.php';
        ?>
        <!------------------ END OF ASIDE ---------------->

        <main class="main-student" style="margin-top: 0px;">
            <div class="right">
                <div class="top">
                    <button id="menu-btn" class="menu-btn">
                        <span class="material-symbols-sharp">menu</span>
                    </button>
                    <h1>Clearance</h1>
                    <div class="theme-toggler">
                        <span class="material-symbols-sharp active">light_mode</span>
                        <span class="material-symbols-sharp">dark_mode</span>
                    </div>
                    <div class="profile">
                        <div class="info">
                            <p>Hey, <b>World</b></p>
                            <small class="text-muted">Admin</small>
                        </div>
                        <div class="profile-photo">
                            <img src="../images/profile-1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <!-- ========== END OF TOP ============= -->
    
            </div>

            

            <div class="form-and-table-container">
                <a href="clearance.php" style="
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
                                <h3 class="overall-clearance-status"><?= $row['clearance_status'] ? 'Cleared' : 'Not Cleared';?></h3>
                            </div>
                        </div>
                        <div class="detail-left-main-content">
                            
                                <div class="clearance-info-container">
                                    <h3>Owner</h3>
                                    <h4><?= $row['student_first_name'].' '.$row['student_middle_name'].' '.$row['student_last_name'];?></h4>
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
                                    <h4><?= $row['date_cleared'];?></h4>
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
                                        <th>Requirements</th>
                                        <th>Status</th>
                                        <th>Date Cleared</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php    $users = $db->result('requirement_view', 'clearance_progress_id = '.$clearance_progress_id.' AND student_id = "'.$student_id.'"'); ?>
                                    <?php foreach($users as $user):?>
                                    <tr>
                                    <tr>
                                        <td><?= $user->office_name; ?></td>
                                        <td><?= $user->requirement_details; ?></td>
                                        <td><?= $user->is_complied ? 'Approve' : 'Not Cleared'; ?></td>
                                        <td><?= $user->date_cleared; ?></td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table> 
                        </div>
                    </div>
                </div>
            </div>
            
        </main>
        <!-- ================ END OF MAIN =================== -->

    </div>
        

    
    <!-- <script src="../assets/js/student-info.js"></script> -->
    
    <script defer src="../assets/js//modal.js"></script>
    <script src="../assets/js/index.js"></script>
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
