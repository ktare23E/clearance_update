<?php
    include_once 'header.php';
    // $users1 = $db->result('office');



?>
<style>
    .intro {
    height: 100%;
    }
    .gradient-custom {
    /* fallback for old browsers */
    background: #fa709a;
    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to bottom right, rgba(250, 112, 154, 1), rgba(254, 225, 64, 1));
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to bottom right, rgba(250, 112, 154, 1), rgba(254, 225, 64, 1))
    }
    /* Change dissabled Button color  */
    #submit:disabled{
    background-color: red;
    opacity:0.5;   
}
    
</style>
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
                        <div class="back-button">
                            <a href="department.php">
                                <button id="back-button-to-office">
                                <span class="material-symbols-sharp">arrow_back</span>
                            </button>
                            </a>
                            
                        </div>
                        <span class="title">Add New Department</span>
        
                        <form action="insert_department.php" method="POST">
                            <div class="input-field-container">
                                <div class="input-field">
                                    <span id="check_department"></span><br>
                                    <input type="text" name="department_name" id="department_name" oninput="checkDepartment()" placeholder="Department Name" required>
                                    <i class="uil uil-user"></i>
                                </div>
                                <div class="input-field">
                                    <input type="email" name="department_email" placeholder="Department Email" required>
                                    <i class="uil uil-envelope icon"></i>
                                </div>
                            </div>
                            <div class="input-field-container">
                                <div class="input-field">
                                    <input type="text" name="department_phone_number" placeholder="Department Phone Number" required>
                                    <i class="uil uil-user"></i>
                                </div>
                                <div class="input-field">
                                    <label for="">Department Description</label>
                                    <textarea style="border-style: 1px solid;" name="department_description" id="" rows="4" cols="50"></textarea>
                                </div>
                            </div>
                            <div class="input-field-container">
                                <div class="input-field">
                                    <i class="uil uil-bolt"></i>
                                    <select name="department_status" id="">
                                        <option value="Status">Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-field button">
                                <input type="submit" id="submit" value="Create Account">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- -------------  END OF REGISTRATION -------------- -->
            </div>
            
        </main>
        <!-- ================ END OF MAIN =================== -->

    </div>
    <div id="overlay"></div>
    
    <div id="overlay-update"></div>

<script>
function checkDepartment() {
    
    jQuery.ajax({
    url: "check_department.php",
    data:'department_name='+$("#department_name").val(),
    type: "POST",
    success:function(data){
        $("#check_department").html(data);
    },
    error:function (){}
    });
}
</script>
    <!-- <script src="../assets/js/student-info.js"></script> -->
    
    <script defer src="../assets/js//modal.js"></script>
    <script src="../assets/js/index.js"></script>
    <script defer src="../assets/js/active.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    
</body>
</html>
