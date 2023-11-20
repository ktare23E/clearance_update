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
                    <h1>School Year</h1>
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
                            <a href="sy_sem.php">
                                <button id="back-button-to-office">
                                <span class="material-symbols-sharp">arrow_back</span>
                            </button>
                            </a>
                            
                        </div>
                        <span class="title">Add New School Year</span>
        
                        <form action="insert_sy_sem.php" method="POST">
                            <div class="input-field-container">
                                <div class="input-field">
                                    <span id="check_office" class="check-available"></span>
                                    <input type="text" name="school_year_and_sem" id="school_year_and_sem" oninput="checkOffice()" placeholder="School Year" required>
                                    <p class="input-warning danger">Input numbers and hyphen only</p>
                                    <i class="uil uil-user"></i>
                                </div>
                                
                            </div>
                            <div class="input-field button">
                                <input type="submit" id="submit" value="Create New School Year">
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
                url: "check_school_year.php",
                data:'school_year_and_sem='+$("#school_year_and_sem").val(),
                type: "POST",
                success:function(data){
                    $("#check_office").html(data);
                },
                error:function (){}
                });
            }
</script>

            <script>

            const inputElement = document.getElementById("school_year_and_sem");
            const warningInput = document.querySelector(".input-warning")

            inputElement.addEventListener("input", function() {
            const inputValue = this.value;
            const regex = /^[0-9-]*$/;

            if (!regex.test(inputValue)) {
                this.value = inputValue.replace(/[^0-9-]/g, "");
                warningInput.classList.add("active")
            }

            });

</script>
    
    <!-- <script src="../assets/js/student-info.js"></script> -->
    
    <script defer src="../assets/js//modal.js"></script>
    <script src="../assets/js/index.js"></script>
    <script defer src="../assets/js/active.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    
</body>
</html>
