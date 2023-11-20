<?php
    include_once 'header.php';
    // $users1 = $db->result('office');
    // $users = $db->result('offices');


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
                    <div class="theme-toggler">
                        <span class="material-symbols-sharp active">light_mode</span>
                        <span class="material-symbols-sharp">dark_mode</span>
                    </div>
                    <div class="profile">
                        <div class="info">
                            <p>Hey, <b>Daniel</b></p>
                            <small class="text-muted">Admin</small>
                        </div>
                        <div class="profile-photo">
                            <img src="../images/profile-1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <!-- ========== END OF TOP ============= -->
    
            </div>

            <h1>Signing Office</h1>

            <div class="form-and-table-container">

                <!-- -------------  STUDENT REGISTRATION FORM -------------- -->
                <div class="student-registration">
                    <div class="form signup">
                        <div class="back-button">
                            <a href="signing_office.php" style="display:inline-block">
                                <button id="back-button-to-office">
                                <span class="material-symbols-sharp">arrow_back</span>
                            </button>
                            </a>
                        </div>
                        <span class="title">Add New Signing Office</span>
        
                        <form action="insert_signing_office.php" method="POST">
                            <div class="input-field-container">
                            <div class="input-field">
                                    <i class="uil uil-bolt no-pointer"></i>
                                    <select name="office_id" id="">
                                        <option default>Select Office</option>
                                            <?php $offices = $db->result('office', 'office_name != "System Administrator"');?>
                                            <?php foreach($offices as $office):?>
                                            <option value="<?= $office->office_id; ?>"><?= $office->office_name; ?></option>
                                            <?php endforeach; ?>
                                    </select>

                            </div>
                                <div class="input-field">
                                    <i class="uil uil-bolt no-pointer"></i>
                                    <select name="clearance_progress_id" id="">
                                            <option default>Select School Year And Sem</option>
                                            <?php $clearances = $db->result('clearance_progress_view', 'status = "Active"');?>
                                            <?php foreach($clearances as $clearance):?>
                                            <option value="<?= $clearance->clearance_progress_id; ?>"><?= $clearance->school_year_and_sem.' '.$clearance->sem_name; ?></option>
                                            <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="input-field">
                                            <i class="uil uil-bolt no-pointer"></i>
                                            <select name="clearance_type_id" id="">
                                                    <option default>Select Clearance Type</option>
                                                    <?php $clearances = $db->result('clearance_type');?>
                                                    <?php foreach($clearances as $clearance):?>
                                                    <option value="<?= $clearance->clearance_type_id; ?>" ><?= $clearance->clearance_type_name; ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                </div>
                            </div>
                            <div class="input-field-container">
                                <!-- <div class="input-field">
                                    <i class="uil uil-bolt no-pointer"></i>
                                    <select name="admin_id" id="">
                                            <option default>Select Admin Name</option>
                                            <?php $admins = $db->result('admin','admin_name != "Admin"');?>
                                            <?php foreach($admins as $admin):?>
                                            <?php if($admin->admin_id == $admin_id):?>  
                                            <option value="<?= $admin->admin_id; ?>"><?= $admin->admin_name; ?></option>
                                            <?php else:?>
                                                <option value="<?= $admin->admin_id; ?>"><?= $admin->admin_name; ?></option>
                                            <?php endif;?>
                                            <?php endforeach; ?>
                                    </select>
                                </div> -->
                                
                            </div>
                            <div class="input-field button">
                                <input type="submit" id="submit" value="Create Signing Office">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- -------------  END OF REGISTRATION -------------- -->
            </div>
            
        </main>
        <!-- ================ END OF MAIN =================== -->

    </div>



<script>
function checkCourse() {
    
    jQuery.ajax({
    url: "check_course.php",
    data:'course_name='+$("#course_name").val(),
    type: "POST",
    success:function(data){
        $("#check_office").html(data);
    },
    error:function (){}
    });
}
</script>
    
    <!-- <script src="../assets/js/student-info.js"></script> -->
    
    <script defer src="../assets/js//modal.js"></script>
    <script src="../assets/js/index.js"></script>
    <script defer src="../assets/js/active.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    
</body>
</html>
