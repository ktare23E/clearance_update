<?php
    include_once 'header.php';
    // $users = $db->result('student');

    
    include_once '../connection.php';

    if($conn->connect_error){
        echo $conn->connect_error;
    }
    
    if(!isset($_GET['details'])){
        echo "<h1>There's an error while viewing details.</h1>";
    }else{
        $id = $_GET['details'];
        $sql = "SELECT * FROM admin_account WHERE admin_id = '$id'";
        $students = $conn->query($sql) or die($conn->error);
        $row = $students->fetch_assoc();
    
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

            <div class="form-and-table-container">
                <div class="student-view-top">
                    <div class="student-pic-container">
                        <a href="office_account.php" style="align-self: flex-start;">
                            <button id="back-button-to-student">
                                <span class="material-symbols-sharp">arrow_back</span>
                            </button>
                        </a>
                        <div class="student-view-profile-img-container">
                            <img src="../images/default.png" alt="">
                        </div>
                        <div style="display:flex; flex-direction:row;align-items:center;gap:10px;margin-top:30px">
                            <button onclick="location.href = 'edit_office_account_info.php?edit=<?= $row['admin_id'];?>';" class="edit-profile-button" id="edit-profile-button">
                                <span class="material-symbols-sharp">edit</span>
                                <h3>Edit Profile</h3>
                            </button>
                        </div>
                    </div>
                    <div class="student-view-profile-container">
                        <h1 style="font-size: 24px;"><?php echo $row['office_name']?></h1>
                        <div class="student-view-profile-info-container" style="grid-template-columns: repeat(3, 1fr);">
                            <div class="student-info-name-container">
                                <h2 class="label">Admin ID :</h2>
                                <h2><?php echo $row['admin_id']?></h2>
                            </div>
                            <div class="student-info-name-container">
                                <h2 class="label">Admin Name :</h2>
                                <h2><span><?= $row['admin_name']; ?></span></h2>
                            </div>
                            <div class="student-info-name-container">
                                <h2 class="label">User Type :</h2>
                                <h2><span><?= $row['user_type'];?>&nbsp;</span></h2>
                            </div>
                            <div class="student-info-name-container">
                                    <h2 class="label">Admin Username :</h2>
                                    <h2><span><?= $row['admin_username'] ?></span></h2>
                            </div>
                            <div class="student-info-name-container">
                                <h2 class="label">Date Registered:</h2>
                                <h2><span><?= $row['date_registered'];?></span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </main>
        <!-- ================ END OF MAIN =================== -->
    </div>

    <?php  }?>
    
    <script defer src="../assets/js//modal.js"></script>
    <script src="../assets/js/index.js"></script>
    <script defer src="../assets/js/active.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    
</body>
</html>
