<?php
    include_once 'header.php';
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
                        <div class="back-button">
                            <a href="office.php">
                                <button id="back-button-to-office">
                                <span class="material-symbols-sharp">arrow_back</span>
                            </button>
                            </a>
                            
                        </div>
                        <span class="title">Add New Office</span>
        
                        <form action="insert_office.php" method="POST">
                            <div class="input-field-container">
                                <div class="input-field">
                                    <span id="check_office" class="check-available"></span>
                                    <input type="text" name="office_name" id="office_name" oninput="checkOffice()" placeholder="Office Name" required>
                                    <i class="uil uil-user"></i>
                                </div>
                                <div class="input-field">
                                    <input type="email" name="office_email" placeholder="Office Email" required>
                                    <i class="uil uil-envelope icon"></i>
                                </div>
                            </div>
                            <div class="input-field-container">
                                <div class="input-field">
                                    <input type="text" name="office_phone_number" placeholder="Office Phone Number" required>
                                    <i class="uil uil-user"></i>
                                </div>
                                <div class="input-field">
                                    
                                    <textarea placeholder="Office Description" style="border-style: 1px solid;" name="office_description" id="" rows="4" cols="50"></textarea>
                                </div>
                            </div>
                            <div class="input-field-container">
                                <div class="input-field">
                                    <i class="uil uil-bolt"></i>
                                    <select name="office_status" id="">
                                        <option value="Status">Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                                <div class="input-field">
                                    <i class="uil uil-bolt"></i>
                                    <select name="is_department" id="">
                                        <option value="Type">Type</option>
                                        <option value="0">Office</option>
                                        <option value="1">Department</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-field button">
                                <input type="submit" id="submit" value="Create Office">
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
            function checkOffice() {
                
                jQuery.ajax({
                url: "check_office.php",
                data:'office_name='+$("#office_name").val(),
                type: "POST",
                success:function(data){
                    $("#check_office").html(data);
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
