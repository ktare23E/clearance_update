<?php
    include_once 'header.php';
    
    include_once '../connection.php';


    if(!isset($_GET['edit'])){
        echo "<h1>There's an error while viewing details.</h1>";
    }else{
        $id = $_GET['edit'];
        $sql = "SELECT * FROM view_clearance WHERE clearance_id = '$id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);

        $clearance_id = $row['clearance_id'];
        $student_id = $row['student_id'];
        $clearance_progress_id = $row['clearance_progress_id'];
        $clearance_status = $row['clearance_status'];
        $course_id = $row['course_id'];
        $office_id = $row['office_id'];
        $clearance_type_id = $row['clearance_type_id'];
        // $date_created = $row['date_created'];
        // $sem_name = $row['sem_name'];


?>

<div class="container-student">
        <!-- sidebar -->
        <?php
                include_once 'aside.php';
        ?>
        <!------------------ END OF ASIDE ---------------->

        <main class="main-student">
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

                <!-- -------------  STUDENT REGISTRATION FORM -------------- -->
                <div class="student-registration">
                    <div class="form signup">
                        <div class="back-button action-button-container">
                            <a href="clearance.php">
                                <button id="back-button-to-student">
                                    <span class="material-symbols-sharp">arrow_back</span>
                                </button>
                            </a>
                        </div>
                        <span class="title">Edit Clearance Information</span>

                    <form action="update_clearance.php" method="POST">
                    <div class="input-field-container">
                            <div class="input-field">
                                    <input type="hidden" name="clearance_id" value="<?= $clearance_id ?>">
                                    <input type="hidden" name="office_id" value="<?= $office_id; ?>">
                                    <input type="hidden" name="course_id" value="<?= $course_id; ?>">
                                    <input type="text" name="student_id" placeholder="Student Id" value="<?= $student_id; ?>" required>
                            </div>
                                <div class="input-field">
                                    <label for="">Select School Year and Sem</label>
                                    <select name="clearance_progress_id" id="">
                                            <option default>Select School Year and Sem</option>
                                            <?php $semesters = $db->result('clearance_progress_view','status = "Active"');?>
                                            <?php foreach($semesters as $semester):?>
                                            <?php if($semester->clearance_progress_id == $clearance_progress_id):?>  
                                            <option value="<?= $semester->clearance_progress_id; ?>" selected><?= $semester->school_year_and_sem.' '.$semester->sem_name; ?></option>
                                            <?php else:?>
                                                <option value="<?= $semester->clearance_progress_id; ?>" selected><?=$semester->school_year_and_sem.' '.$semester->sem_name; ?></option>
                                            <?php endif;?>
                                            <?php endforeach; ?>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="input-field-container">
                                <input type="hidden" name="clearance_status" value="1">
                            <!-- <div class="input-field">
                                <label for="">Semester</label>
                        <select name="sem_id" id="">
                                <?php $semesters = $db->result('sem');?>
                                <?php foreach($semesters as $semester):?>
                                    <option value="<?= $semester->sem_id ?>" <?= ($semester->sem_name == $sem_name)? "selected" : "" ?>><?= $semester->sem_name; ?></option>
                                <?php endforeach; ?>
                        </select>
                            </div> -->
                                <div class="input-field">
                                            <label for="">Clearance Type</label>
                                            <select name="clearance_type_id" id="">
                                                <?php $clearances = $db->result('clearance_type');;?>
                                                <?php foreach($clearances as $clearance_type):?>
                                                <?php if($clearance_type->clearance_type_id == $clearance_type_id):?> 
                                                <option value="<?= $clearance_type->clearance_type_id; ?>" selected><?= $clearance_type->clearance_type_name; ?></option>
                                                <?php else:?>
                                                    <option value="<?= $clearance_type->clearance_type_id; ?>"><?= $clearance_type->clearance_type_name; ?></option>
                                                <?php endif;?>
                                                <?php endforeach; ?>
                                            </select>
                                </div>
                                
                            </div>
                        <div class="input-field button">
                            <input type="submit" name="update" value="Update Clearance">
                        </div>
                </form>
            </div>
        </div>
                <!-- -------------  END OF REGISTRATION -------------- -->
            </div>
            
        </main>
        <!-- ================ END OF MAIN =================== -->

    </div>

    <?php }?>

    <script defer src="../assets/js//modal.js"></script>
    <script src="../assets/js/index.js"></script>
    <script defer src="../assets/js/active.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>
</html>


        