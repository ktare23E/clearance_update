<?php
    include_once '../admin/header.php';
    // $users = $db->result('student');

    
    include_once '../connection.php';
    if($conn->connect_error){
        echo $conn->connect_error;
    }
    
    if(!isset($_GET['details'])){
        echo "<h1>There's an error while viewing details.</h1>";
    }else{
        $id = $_GET['details'];
        $sql = "SELECT * FROM student_details WHERE student_id = '$id'";
        $students = $conn->query($sql) or die($conn->error);
        $row = $students->fetch_assoc();
    
?>
    <div class="container-student">
        <!-- sidebar -->
        <?php
                include_once '../admin/aside.php';
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
                    <div class="action-button-container">
                        <a href="student.php">
                            <button id="back-button-to-student">
                                <span class="material-symbols-sharp">arrow_back</span>
                            </button>
                        </a>

                        <div class="student-view-profile-img-container">
                            <img src="../admin/uploads/<?= $row['student_profile']; ?>" alt="">
                        </div>
                        <div>
                            <button onclick="location.href = 'edit_student_info.php?edit=<?= $row['student_id'];?>';" class="edit-profile-button" id="edit-profile-button">
                                <span class="material-symbols-sharp">edit</span>
                                <h3>Edit Profile</h3>
                            </button>

                            <div class="student-info-name-container clearance-status-btn-container">
                                <button id="clearance-status-button">Clearance Status</button>
                            </div>
                        </div>
                        
                        
                    </div>

                    <div class="student-view-profile-container">
                        

                        <div class="student-view-profile-info-container">
                            <div class="student-info-name-container">
                                <h2 class="label">Student Id :</h2>
                                <h2><?php echo $row['student_id']?></h2>
                            </div>
                            <div class="student-info-name-container">
                                <h2 class="label">Name :</h2>
                                <h2><span><?= $row['student_first_name']; ?></span><span>&nbsp;</span><span><?= $row['student_last_name'];?></span></h2>
                            </div>
                            <div class="student-info-name-container">
                                <h2 class="label">Course :</h2>
                                <h2><span><?= $row['course_name'];?></span></h2>
                            </div>
                            <div class="student-info-name-container">
                                <h2 class="label">Year :</h2>
                                <h2><span><?= $row['student_year'];?></span></h2>
                            </div>
                            <div class="student-info-name-container">
                                <h2 class="label">Gender :</h2>
                                <h2><span><?= $row['student_gender'];?></span></h2>
                            </div>
                            <div class="student-info-name-container">
                                <h2 class="label">Email :</h2>
                                <h2><span><?= $row['student_email'];?></span></h2>
                            </div>
                            <div class="student-info-name-container">
                                    <h2 class="label">Username :</h2>
                                <h2><span><?= $row['student_username'] ?></span></h2>
                            </div>
                            <div class="student-info-name-container">
                                <h2 class="label">Status :</h2>
                                <h2><span><?= $row['student_status'] ?></span></h2>
                            </div>
                            <div class="student-info-name-container">
                                <h2 class="label">Department :</h2>
                                <h2><span><?= $row['department_name']?></span></h2>
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
