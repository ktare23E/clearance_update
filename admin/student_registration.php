<?php
    include_once 'header.php';
    $users = $db->result('student');
    $departments = ['School of Information and Technology, School of Arts and Sciences'];
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

            

            <div class="form-and-table-container">

                <!-- -------------  STUDENT REGISTRATION FORM -------------- -->
                <div class="student-registration">
                    <div class="form signup">
                        <div class="back-button">
                            <button id="back-button-to-student">
                                <span class="material-symbols-sharp">arrow_back</span>
                            </button>
                        </div>
                        <span class="title">Add New Student</span>
        
                        <form action="insert_student.php" method="POST" enctype="multipart/form-data" enctype="multipart/form-data">
                            <div class="input-field">
                                    <input type="text" placeholder="Student Id" name="student_id" required>
                                    <i class="uil uil-keyhole-circle icon"></i>
                            </div>

                            <div class="input-field-container">
                                <div class="input-field">
                                    <input type="text" name="student_first_name" placeholder="First Name" required>
                                    <i class="uil uil-user icon"></i>
                                </div>
                                <div class="input-field">
                                    <input type="text" name="student_middle_name" placeholder="Middle Name" required>
                                    <i class="uil uil-user icon"></i>
                                </div>
                                <div class="input-field">
                                    <input type="text" name="student_last_name" placeholder="Last Name" required>
                                    <i class="uil uil-user icon"></i>
                                </div>
                            </div>
                            <div class="input-field-container">
                                
                                <div class="input-field">
                                    <i class="uil uil-question-circle icon"></i>
                                    <select name="student_gender" id="gender-options">
                                        <option value="Gender">Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="input-field">
                                    <i class="uil uil-bolt icon"></i>
                                    <select name="student_status" id="">
                                        <option value="Status">Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-field-container">
                                <div class="input-field">
                                    <i class="uil uil-analysis icon"></i>
                                    
                                    <select name="student_year" id="year-level-option">
                                        <option value="0" >Year Level</option>
                                        <option value="1st Year">1st Year</option>
                                        <option value="2nd Year">2nd Year</option>
                                        <option value="3rd Year">3rd Year</option>
                                        <option value="4th Year">4th Year</option>
                                    </select>
                                </div>
                                <div class="input-field">
                                    <i class="uil uil-analysis icon"></i>
                                    <select name="course_id" id="">
                                            <option default="Select Course">Select Course</option>
                                            <?php $courses = $db->result('course');?>
                                            <?php foreach($courses as $course):?>
                                            <option value="<?= $course->course_id; ?>"><?= $course->course_name; ?></option>
                                            <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                
                            </div>
                            
                            <div class="input-field-container">
                                <div class="input-field">
                                    <input type="email" name="student_email" placeholder="Email Address" required>
                                    <i class="uil uil-envelope icon"></i>
                                </div>
                                <!-- <div class="input-field">
                                    <input type="text" placeholder="Username" name="student_username" required>
                                    <i class="uil uil-envelope icon"></i>
                                </div> -->
                                <div class="input-field">
                                    <input type="password" name="student_password" class="password" placeholder="Create a password" required>
                                    <i class="uil uil-lock icon"></i>
                                    <i class="uil uil-eye-slash showHidePw"></i>
                                </div>
                            </div>
                            <div class="input-field-container" style="margin-top: 20px;">
                                <label for="">Student Profile</label>
                                <input type="file" name="image">
                            </div>
                            <div class="input-field button">
                                <input type="submit" name="submit" value="Create Account">
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
        $(document).ready(function () {

            $('.edit_button').on('click', function () {

                $('#update-modal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_student_id').val(data[0]);
                $('#update_fname').val(data[1]);
                $('#update_lname').val(data[2]);
                $('#update_year').val(data[3]);
                $('#update_course').val(data[4]);
                $('#update_username').val(data[5]);
                $('#update_password').val(data[6]);
            });


            
        });
        
        
    </script>

<script>
            $(document).ready(function(){
                $('.delete').on('click',function(){
                    let student_id = $(this).attr('data-id');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: 'post',
                                url: 'deleteinfo.php',
                                data: {student_id:student_id},
                                success: function(response){
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    )
                                    setTimeout(() => { 
                                        location.reload(true);
                                    }, 3000);
                                } 
                            })
                        }
                    })
                })
            })
        </script>

        <script>

            let selectYearLevel = document.getElementById("year-level-option")
            selectYearLevel.addEventListener("change",() => {
                document.getElementById("year-level-option").options.remove(0)
            })

            let selectGender = document.getElementById("gender-options")
            selectGender.addEventListener("change",() => {
                document.getElementById("gender-options").options.remove(0)
            })

            const backBtn = document.querySelector("#back-button-to-student")

backBtn.addEventListener('click', function(){
    window.location.href = "student.php";
})
        </script>
    
    <!-- <script src="../assets/js/student-info.js"></script> -->
    
    <script defer src="../assets/js//modal.js"></script>
    <script src="../assets/js/index.js"></script>
    <script defer src="../assets/js/active.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    
</body>
</html>
