<?php
    include_once 'header.php';
    include_once '../connection.php';


    if(!isset($_GET['edit'])){
        echo "<h1>There's an error while viewing details.</h1>";
    }else{
        $id = $_GET['edit'];
        $sql = "SELECT * FROM admin WHERE admin_id = '$id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);

        $admin_id = $row['admin_id'];
        $admin_name = $row['admin_name'];
        $admin_username = $row['admin_username'];
        $admin_password = $row['admin_password'];
        $office_id = $row['office_id'];
        $user_type = $row['user_type'];
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
                    <h1>Office Account</h1>
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
                            <a href="office_account.php">
                                <button id="back-button-to-student">
                                    <span class="material-symbols-sharp">arrow_back</span>
                                </button>
                            </a>
                        </div>
                        <span class="title">Edit Office Account Information</span>

                    <form action="update_office_account.php" method="POST">
                        <div class="input-field-container">
                            <div class="input-field">
                                <input type="hidden" name="admin_id" value="<?= $admin_id?>">
                                <input type="text" name="admin_name" placeholder="Admin Name" required value="<?php echo $admin_name; ?>">
                                <i class="uil uil-user"></i>
                            </div>
                        </div>
                        <div class="input-field-container">
                        <div class="input-field">
                                <input type="text" name="admin_username" placeholder="Admin Username" required value="<?php echo $admin_username; ?>">
                                <i class="uil uil-user"></i>
                            </div>
                            <div class="input-field">
                                <input type="password" name="admin_password" placeholder="Admin Password" required value="<?php echo $admin_password; ?>">
                                <i class="uil uil-user"></i>
                            </div>
                        </div>
                        <div class="input-field-container">
                        <div class="input-field">
                                    <label for="">Office Name</label>
                                    <select name="office_id" id="">
                                            <?php $offices = $db->result('office');?>
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
                                    <label for="">User Type</label>
                                    <select name="user_type" id="">
                                        <?php if($user_type === 'Admin'):?>
                                        <option value="<?= $user_type; ?>" selected><?= $user_type; ?></option>
                                        <?php else:?>
                                                <option value="Admin">Admin</option>
                                            <?php endif;?>
                                        <?php if($user_type === 'Office Admin'):?>
                                        <option value="<?= $user_type; ?>" selected><?= $user_type; ?></option>
                                        <?php else:?>
                                                <option value="Office Admin">Office Admin</option>
                                            <?php endif;?>
                                    </select>
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

    <?php }?>

    <script defer src="../assets/js//modal.js"></script>
    <script src="../assets/js/index.js"></script>
    <script defer src="../assets/js/active.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>
</html>


        