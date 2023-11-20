<?php
    include_once 'header.php';
    include_once '../connection.php';


    if(!isset($_GET['edit'])){
        echo "<h1>There's an error while viewing details.</h1>";
    }else{
        $id = $_GET['edit'];
        $sql = "SELECT * FROM course_view WHERE course_id = '$id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);

        $course_id = $row['course_id'];
        $course_name = $row['course_name'];
        $course_description = $row['course_description'];
        $course_status = $row['course_status'];
        $office_id = $row['office_id'];
        $office_name = $row['office_name'];
        

    

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
                    <h1>Course</h1>
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
                            <a href="course.php">
                                <button id="back-button-to-student">
                                    <span class="material-symbols-sharp">arrow_back</span>
                                </button>
                            </a>
                        </div>
                        <span class="title">Edit Course Information</span>

                    <form action="update_course.php" method="POST">
                        <div class="input-field-container">
                            <div class="input-field">
                                <input type="hidden" name="course_id" value="<?= $course_id?>">
                                <input type="text" name="course_name" placeholder="Department Name" required value="<?php echo $course_name; ?>">
                                <i class="uil uil-user"></i>
                            </div>
                            <div class="input-field">
                                    <i class="uil uil-bolt"></i>
                                    <select name="course_status" id="">
                                        <?php if($course_status === 'Active'):?>
                                        <option value="<?= $course_status; ?>" selected><?= $course_status; ?></option>
                                        <?php else:?>
                                                <option value="Active">Active</option>
                                            <?php endif;?>
                                        <?php if($course_status === 'Inactive'):?>
                                        <option value="<?= $course_status; ?>" selected><?= $course_status; ?></option>
                                        <?php else:?>
                                                <option value="Inactive">Inactive</option>
                                            <?php endif;?>
                                    </select>
                                </div>
                        </div>
                        <div class="input-field-container">
                            <div class="input-field">
                                
                                <textarea style="border-style: 1px solid;" name="course_description" id="" rows="4" cols="50"><?= $course_description?></textarea>
                            </div>
                            <div class="input-field">
                            <i class="uil uil-analysis"></i>
                            <select name="office_id" id="">
                                <?php $offices = $db->result('office','is_department = 1');?>
                                <?php foreach($offices as $office):?>
                                <?php if($office->office_id == $office_id):?>  
                                <option value="<?= $office->office_id; ?>" selected><?= $office->office_name; ?></option>
                                <?php else:?>
                                    <option value="<?= $office->office_id; ?>"><?= $office->office_name; ?></option>
                                <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                            </div>
                        </div>
                        <div class="input-field button">
                            <input type="submit" name="update" value="Update Course">
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


        