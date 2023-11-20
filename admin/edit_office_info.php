<?php
    include_once 'header.php';
    include_once '../connection.php';


    if(!isset($_GET['edit'])){
        echo "<h1>There's an error while viewing details.</h1>";
    }else{
        $id = $_GET['edit'];
        $sql = "SELECT * FROM office WHERE office_id = '$id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);

        $office_id = $row['office_id'];
        $office_name = $row['office_name'];
        $office_email = $row['office_email'];
        $office_phone_number = $row['office_phone_number'];
        $office_description = $row['office_description'];
        $office_status = $row['office_status'];
        $is_department = $row['is_department'];
    
        

    

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
                    <h1>Office</h1>
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
                            <a href="office.php">
                                <button id="back-button-to-student">
                                    <span class="material-symbols-sharp">arrow_back</span>
                                </button>
                            </a>
                        </div>
                        <span class="title">Edit Office Information</span>

                    <form action="update_office.php" method="POST">
                        <div class="input-field-container">
                            <div class="input-field">
                                <input type="hidden" name="office_id" value="<?= $office_id?>">
                                <input type="text" name="office_name" placeholder="Office Name" required value="<?php echo $office_name; ?>">
                                <i class="uil uil-user"></i>
                            </div>
                            <div class="input-field">
                                <input type="email" name="office_email" placeholder="Office Email" required value="<?php echo $office_email; ?>">
                                <i class="uil uil-user"></i>
                            </div>
                        </div>
                        <div class="input-field-container">
                            <div class="input-field">
                                <input type="text" name="office_phone_number" placeholder="Office Phone Number" required value="<?php echo $office_phone_number; ?>">
                                <i class="uil uil-user"></i>
                            </div>
                            <div class="input-field">
                                <label for="">Status</label>
                                    <select name="office_status" id="">
                                        <?php if($office_status === 'Active'):?>
                                        <option value="<?= $office_status; ?>" selected><?= $office_status; ?></option>
                                        <?php else:?>
                                                <option value="Active">Active</option>
                                            <?php endif;?>
                                        <?php if($office_status === 'Inactive'):?>
                                        <option value="<?= $office_status; ?>" selected><?= $office_status; ?></option>
                                        <?php else:?>
                                                <option value="Inactive">Inactive</option>
                                            <?php endif;?>
                                    </select>
                            </div>
                            <div class="input-field">
                                <label for="">Office Type</label>
                                    <select name="is_department" id="">
                                        <option value="1" <?= $is_department == 1 ? 'selected = "selected"':''; ?>>Department</option>
                                        <option value="0" <?= $is_department == 0 ?'selected = "selected"': ''; ?> >Office</option>
                                    </select>
                            </div>
                        </div>
                        <div class="input-field-container">
                            <div class="input-field">
                                
                                <textarea style="border-style: 1px solid;" name="office_description" id="" rows="4" cols="50"><?= $office_description?></textarea>
                            </div>
                        </div>
                        <div class="input-field button">
                            <input type="submit" name="update" value="Update Office">
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


        