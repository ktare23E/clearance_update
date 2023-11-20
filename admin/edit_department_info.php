<?php
    include_once 'header.php';
    include_once '../connection.php';


    if(!isset($_GET['edit'])){
        echo "<h1>There's an error while viewing details.</h1>";
    }else{
        $id = $_GET['edit'];
        $sql = "SELECT * FROM department WHERE department_id = '$id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);

        $department_id = $row['department_id'];
        $department_name = $row['department_name'];
        $department_email = $row['department_email'];
        $department_phone_number = $row['department_phone_number'];
        $department_description = $row['department_description'];
        $department_status = $row['department_status'];
    
        
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

            <h1>Department</h1>

            <div class="form-and-table-container">

                <!-- -------------  STUDENT REGISTRATION FORM -------------- -->
                <div class="student-registration">
                    <div class="form signup">
                        <div class="back-button action-button-container">
                            <a href="department.php">
                                <button id="back-button-to-student">
                                    <span class="material-symbols-sharp">arrow_back</span>
                                </button>
                            </a>
                        </div>
                        <span class="title">Edit Department Information</span>

                    <form action="update_department.php" method="POST">
                        <div class="input-field-container">
                            <div class="input-field">
                                <input type="hidden" name="department_id" value="<?= $department_id?>">
                                <input type="text" name="department_name" placeholder="Department Name" required value="<?php echo $department_name; ?>">
                                <i class="uil uil-user"></i>
                            </div>
                            <div class="input-field">
                                <input type="email" name="department_email" placeholder="Department Email" required value="<?php echo $department_email; ?>">
                                <i class="uil uil-user"></i>
                            </div>
                        </div>
                        <div class="input-field-container">
                            <div class="input-field">
                                <input type="text" name="department_phone_number" placeholder="Department Phone Number" required value="<?php echo $department_phone_number; ?>">
                                <i class="uil uil-user"></i>
                            </div>
                            <div class="input-field">
                                <label for="">Status</label>
                                    <select name="department_status" id="">
                                        <?php if($department_status === 'Active'):?>
                                        <option value="<?= $department_status; ?>" selected><?= $department_status; ?></option>
                                        <?php else:?>
                                                <option value="Active">Active</option>
                                            <?php endif;?>
                                        <?php if($department_status === 'Inactive'):?>
                                        <option value="<?= $department_status; ?>" selected><?= $department_status; ?></option>
                                        <?php else:?>
                                                <option value="Inactive">Inactive</option>
                                            <?php endif;?>
                                    </select>
                            </div>
                        </div>
                        <div class="input-field-container">
                            <div class="input-field">
                                <label for="">Department Description</label><br>
                                <textarea style="border-style: 1px solid;" name="department_description" id="" rows="4" cols="50"><?= $department_description?></textarea>
                            </div>
                        </div>
                        <div class="input-field button">
                            <input type="submit" name="update" value="Update Account">
                        </div>
                </form>
            </div>
        </div>
                <!-- -------------  END OF REGISTRATION -------------- -->
            </div>
            
        </main>
        <!-- ================ END OF MAIN =================== -->

    </div>



    <script defer src="../assets/js//modal.js"></script>
    <script src="../assets/js/index.js"></script>
    <script defer src="../assets/js/active.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>
</html>


        