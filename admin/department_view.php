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
        $sql = "SELECT * FROM department WHERE department_id = '$id'";
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
            

            <div class="student-view-top">
                
                <div class="action-button-container">
                    <a href="department.php">
                        <button id="back-button-to-student">
                            <span class="material-symbols-sharp">arrow_back</span>
                        </button>
                    </a>
                    <button onclick="location.href = 'edit_department_info.php?edit=<?= $row['department_id'];?>';" class="edit-profile-button" id="edit-profile-button">
                        <span class="material-symbols-sharp">edit</span>
                        <h3>Edit Profile</h3>
                    </button>
                </div>
                <h1><span><?= $row['department_name']; ?></span><span>&nbsp;</span></h1>
                <div class="icons-course-year-container">
                    <span class="material-symbols-sharp">person_outline</span>
                    <!-- <h2><span><?= $row['student_course'];?>&nbsp;-</span><span>&nbsp;<?= $row['student_year'];?></span></h2> -->
                </div>
                
            </div>
            

            <div class="form-and-table-container">

                <!-- -------------  STUDENT REGISTRATION FORM -------------- -->
                <div class="student-registration">
                    <div class="student-view-profile-container">
                        <div class="student-view-profile-img-container">
                            <img src="../images/dp.png" alt="">
                        </div>

                        <div class="student-view-profile-info-container">
                            <div class="student-info-name-container">
                                <div class="icon-label-container">
                                    <span class="material-symbols-sharp">badge</span>
                                    <h2 class="label">Department Id :</h2><span>&emsp;&nbsp;&nbsp;</span>
                                </div>
                                
                                <h2><?php echo $row['department_id']?></h2>
                            </div>
                            <div class="student-info-name-container">
                                <div class="icon-label-container">
                                    <span class="material-symbols-sharp">person_outline</span>
                                    <h2 class="label">Department Name :</h2><span class="removable-span">&emsp;&emsp;&emsp;&emsp;&emsp;</span>
                                </div>
                                
                                <h2><span><?= $row['department_name']; ?></span></h2>
                            </div>
                            <div class="student-info-name-container">
                                <div class="icon-label-container">
                                    <span class="material-symbols-sharp">contact_mail</span>
                                    <h2 class="label">Department Email :</h2><span>&emsp;&nbsp;</span>
                                </div>
                                
                                <h2><span><?= $row['department_email'] ?></span></h2>
                            </div>
                            <div class="student-info-name-container">
                                <div class="icon-label-container">
                                    <span class="material-symbols-sharp">menu_book</span>
                                <h2 class="label">Phone Number :</h2><span class="removable-span">&emsp;&emsp;&emsp;&emsp;</span>
                                </div>
                                
                                <h2><span><?= $row['department_phone_number'];?></span></h2>
                            </div>
                            <div class="student-info-name-container">
                                <div class="icon-label-container">
                                    <span class="material-symbols-sharp">timeline</span>
                                    <h2 class="label">Department Status :</h2><span class="removable-span">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</span>
                                </div>
                                
                                <h2><span><?= $row['department_status'];?></span></h2>
                            </div>
                            <div class="student-info-name-container">
                                <div class="icon-label-container">
                                    <span class="material-symbols-sharp">corporate_fare</span>
                                    <h2 class="label">Department Description :</h2><span class="removable-span">&emsp;&emsp;</span>
                                </div>
                                
                                <h2><span><?= $row['department_description']?></span></h2>
                            </div>
                            <div class="student-info-name-container clearance-status-btn-container">
                                <button id="clearance-status-button">Clearance Status</button>
                            </div>
                            
                        </div>
                    </div>  
                </div>
                <!-- -------------  END OF REGISTRATION -------------- -->
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
