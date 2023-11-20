<?php
    include_once 'header.php';
    include_once '../connection.php';


    if(!isset($_GET['edit'])){
        echo "<h1>There's an error while viewing details.</h1>";
    }else{
        $id = $_GET['edit'];
        $sql = "SELECT * FROM new_signing_offices WHERE signing_office_id = '$id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);

        $signing_office_id = $row['signing_office_id'];
        $office_id = $row['office_id'];
        $clearance_progress_id = $row['clearance_progress_id'];
        $sy_sem_id = $row['sy_sem_id'];
        $admin_id = $row['admin_id']; 
        $clearance_type_id = $row['clearance_type_id'];
        $sem_id = $row['sem_id'];
        $sem_name = $row['sem_name'];
    }
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

            <h1>Signing Offices</h1>

            <div class="form-and-table-container">

                <!-- -------------  STUDENT REGISTRATION FORM -------------- -->
                <div class="student-registration">
                    <div class="form signup">
                        <div class="back-button action-button-container">
                            <a href="signing_office.php">
                                <button id="back-button-to-student">
                                    <span class="material-symbols-sharp">arrow_back</span>
                                </button>
                            </a>
                        </div>
                        <span class="title">Edit Signing Office Information</span>

                    <form action="update_signing_office.php" method="POST">
                        <div class="input-field-container">
                            <input type="hidden" name="signing_office_id" value="<?= $signing_office_id; ?>">
                            <div class="input-field">
                                    <i class="uil uil-analysis"></i>
                                    <select name="office_id" id="">
                                            <?php $offices = $db->result('office','office_name != "System Administrator"');?>
                                            <?php foreach($offices as $office):?>
                                            <?php if($office->office_id == $office_id):?> 
                                            <option value="<?= $office->office_id; ?>" selected><?= $office->office_name; ?></option>
                                            <?php else:?>
                                                <option value="<?= $office->office_id; ?>"><?= $office->office_name; ?></option>
                                            <?php endif;?>
                                            <?php endforeach; ?>
                                    </select>
                            </div>
                                <div class="input-field">
                                    <i class="uil uil-analysis"></i>
                                    <select name="clearance_progress_id" id="">
                                            <?php $progression = $db->result('clearance_progress_view','status = "Active"');;?>
                                            <?php foreach($progression as $progress):?>
                                            <?php if($progress->clearance_progress_id == $clearance_progress_id):?> 
                                            <option value="<?= $progress->clearance_progress_id; ?>" selected><?= $progress->school_year_and_sem." ".$progress->sem_name; ?></option>
                                            <?php else:?>
                                                <option value="<?= $progress->clearance_progress_id; ?>"><?= $progress->school_year_and_sem." ".$progress->sem_name; ?></option>
                                            <?php endif;?>
                                            <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="input-field">
                                    <i class="uil uil-analysis"></i>
                                    <select name="clearance_type_id" id="">
                                            <?php $clearances = $db->result('clearance_type');;?>
                                            <?php foreach($clearances as $clearance):?>
                                            <?php if($clearance->clearance_type_id == $clearance_type_id):?> 
                                            <option value="<?= $clearance->clearance_type_id; ?>" selected><?= $clearance->clearance_type_name; ?></option>
                                            <?php else:?>
                                                <option value="<?= $clearance->clearance_type_id; ?>"><?= $clearance->clearance_type_name; ?></option>
                                            <?php endif;?>
                                            <?php endforeach; ?>
                                    </select>
                                </div>
                        </div>
                        <div class="input-field-container">
                                <!-- <div class="input-field">
                                    <i class="uil uil-analysis"></i>
                                    <select name="admin_id" id="">
                                            <?php $admins = $db->result('admin','admin_name != "Admin"');;?>
                                            <?php foreach($admins as $admin):?>
                                            <?php if($admin->admin_id == $admin_id):?> 
                                            <option value="<?= $admin->admin_id; ?>" selected><?= $admin->admin_name; ?></option>
                                            <?php else:?>
                                                <option value="<?= $admin->admin_id; ?>"><?= $admin->admin_name; ?></option>
                                            <?php endif;?>
                                            <?php endforeach; ?>
                                    </select>
                                </div> -->
                                
                            </div>
                            <div class="input-field button">
                                <input type="submit" class="update" name="update" value="Update Signing Office">
                            </div>
                </form>
            </div>
        </div> 
                <!-- -------------  END OF REGISTRATION -------------- -->
            </div>
            
        </main>
        <!-- ================ END OF MAIN =================== -->

    </div>

   

    
    <script src="../assets/js/index.js"></script>
    <script defer src="../assets/js/active.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            //jquery  for success update message
            $(document).ready(function(){
                $('.update').click(function(){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Student Account Updated',
                        showConfirmButton: false,
                        timer: 4000
                    })
                });
            });

        </script>

</body>
</html>


        