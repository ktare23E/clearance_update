<?php
    include_once 'header.php';
    include_once '../connection.php';


    if(!isset($_GET['edit'])){
        echo "<h1>There's an error while viewing details.</h1>";
    }else{
        $id = $_GET['edit'];
        $sql = 'SELECT * FROM student_details WHERE student_id = "'.$id.'"';
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);

        $student_id = $row['student_id'];
        $student_fname = $row['student_first_name'];
        $student_middle_name = $row['student_middle_name'];
        $student_lname = $row['student_last_name'];
        $student_year = $row['student_year']; 
        $student_email = $row['student_email'];
        $student_gender = $row['student_gender'];
        $student_status = $row['student_status'];
        $course_id = $row['course_id'];
        $course_name = $row['course_name'];
        $office_id = $row['office_id'];
        $office_name = $row['office_name'];
        // $student_username = $row['student_username'];
        $student_password = $row['student_password'];
        $student_profile = $row['student_profile'];

        

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
                    <h1>Student Account</h1>
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
                            <a href="student.php">
                                <button id="back-button-to-student">
                                    <span class="material-symbols-sharp">arrow_back</span>
                                </button>
                            </a>
                        </div>
                        <span class="title">Edit Student Information</span>

                    <form action="update_student.php" method="POST" enctype="multipart/form-data">
                        <div class="input-field">
                            <input type="text" placeholder="Student Id" name="student_id" required value="<?php echo $student_id; ?>">
                            <i class="uil uil-keyhole-circle"></i>
                            <input type="hidden" name="students_id" value="<?php echo $student_id; ?>">
                        </div>

                        <div class="input-field-container">
                            <div class="input-field">
                                <input type="text" name="student_first_name" placeholder="First Name" required value="<?php echo $student_fname; ?>">
                                <i class="uil uil-user"></i>
                            </div>
                            <div class="input-field">
                                <input type="text" name="student_middle_name" value="<?= $student_middle_name; ?>" required>
                            </div>
                            <div class="input-field">
                                <input type="text" name="student_last_name" placeholder="Last Name" required value="<?php echo $student_lname; ?>">
                                <i class="uil uil-user"></i>
                            </div>
                        </div>
                        <div class="input-field-container">
                            <div class="input-field">
                                
                                <select name="student_year" id="student_year" required>
                                    
                                    <!-- <option value="<?php echo $student_year; ?>"><?php echo $student_year; ?></option> -->
                                    <option value="1st Year"
                                        <?php
                                                if($student_year == '1st Year'){
                                                    echo "selected";
                                                }
                                        ?>
                                    >1st Year</option>
                                    <option value="2nd Year"
                                        <?php
                                                if($student_year == '2nd Year'){
                                                    echo "selected";
                                                }
                                        ?>
                                    >2nd Year</option>
                                    <option value="3rd Year"
                                        <?php
                                                if($student_year == '3rd Year'){
                                                    echo "selected";
                                                }
                                        ?>
                                    >3rd Year</option>
                                    <option value="4th Year"
                                        <?php
                                                if($student_year == '4th Year'){
                                                    echo "selected";
                                                }
                                        ?>
                                    >4th Year</option>
                                    <!-- <option value="1st Year">1st Year</option>
                                    <option value="2nd Year">2nd Year</option>
                                    <option value="3rd Year">3rd Year</option>
                                    <option value="4th Year">4th Year</option> -->
                                </select>
                                <i class="uil uil-analysis"></i>
                            </div>
                            <div class="input-field">
                                    <select name="course_id" id="">
                                            <?php $courses = $db->result('course');?>
                                            <?php foreach($courses as $course):?>
                                            <?php if($course->course_id == $course_id):?> 
                                            <option value="<?= $course->course_id; ?>" selected><?= $course->course_name; ?></option>
                                            <?php else:?>
                                                <option value="<?= $course->course_id; ?>"><?= $course->course_name; ?></option>
                                            <?php endif;?>
                                            <?php endforeach; ?>
                                    </select>
                                    <i class="uil uil-analysis"></i>
                                </div>
                                <!-- <div class="input-field">
                                    
                                    <select name="office_id" id="">
                                            <?php $offices = $db->result('office','is_department = 1');;?>
                                            <?php foreach($offices as $office):?>
                                            <?php if($office->office_id == $office_id):?> 
                                            <option value="<?= $office->office_id; ?>" selected><?= $office->office_name; ?></option>
                                            <?php else:?>
                                                <option value="<?= $office->office_id; ?>"><?= $office->office_name; ?></option>
                                            <?php endif;?>
                                            <?php endforeach; ?>
                                    </select>
                                    <i class="uil uil-analysis"></i>
                                </div> -->
                        </div>
                        <div class="input-field-container">
                                <div class="input-field">
                                    
                                    <select name="student_gender" id="">
                                        <?php if($student_gender === 'Male'):?>
                                        <option value="<?= $student_gender; ?>" selected><?= $student_gender; ?></option>
                                        <?php else:?>
                                                <option value="Male">Male</option>
                                            <?php endif;?>
                                        <?php if($student_gender === 'Female'):?>
                                        <option value="<?= $student_gender; ?>" selected><?= $student_gender; ?></option>
                                        <?php else:?>
                                                <option value="Female">Female</option>
                                            <?php endif;?>
                                    </select>
                                    <i class="uil uil-analysis"></i>
                                </div>
                                <div class="input-field">
                                    
                                    <select name="student_status" id="">
                                        <?php if($student_status === 'Active'):?>
                                        <option value="<?= $student_status; ?>" selected><?= $student_status; ?></option>
                                        <?php else:?>
                                                <option value="Active">Active</option>
                                            <?php endif;?>
                                        <?php if($student_status === 'Inactive'):?>
                                        <option value="<?= $student_status; ?>" selected><?= $student_status; ?></option>
                                        <?php else:?>
                                                <option value="Inactive">Inactive</option>
                                            <?php endif;?>
                                    </select>
                                    <i class="uil uil-analysis"></i>
                                </div>
                            </div>
                            <div class="input-field-container">
                                <div class="input-field">
                                    <input type="email" name="student_email" placeholder="Email" required value="<?php echo $student_email; ?>">
                                    <i class="uil uil-envelope"></i>
                                </div>
                                <!-- <div class="input-field">
                                    <input type="text" placeholder="Username" value="<?= $student_username; ?>" name="student_username" required>
                                    <i class="uil uil-envelope icon"></i>
                                </div> -->
                                <div class="input-field">
                                    <input type="password" value="<?= $student_password; ?>" name="student_password" class="password" placeholder="Create a password" required>
                                    <i class="uil uil-lock icon"></i>
                                    <i class="uil uil-eye-slash showHidePw"></i>
                                </div>
                            </div>
                            <div class="input-field button">
                                <input type="submit" class="update" name="update" value="Update Student">
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


        