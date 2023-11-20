<?php
include_once 'header.php';
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
                <h1>Semester</h1>
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
                        <a href="semester.php">
                            <button id="back-button-to-office">
                                <span class="material-symbols-sharp">arrow_back</span>
                            </button>
                        </a>
                    </div>
                    <span class="title">Add New Semester</span>
                    <form action="insert_sem.php" method="POST">
                        <div class="input-field-container">
                            <div class="input-field">
                                <span id="check_office"></span>
                                <input type="text" name="sem_name" placeholder="Semester" required>
                                <i class="uil uil-user"></i>
                            </div>
                        </div>
                        <div class="input-field button">
                            <input type="submit" value="Create New Semester">
                        </div>
                    </form>
                </div>
            </div>
            <!-- -------------  END OF REGISTRATION -------------- -->
        </div>

    </main>
    <!-- ================ END OF MAIN =================== -->

</div>

<!-- <script src="../assets/js/student-info.js"></script> -->
<script>
    //create insert ajax
</script>
<script defer src="../assets/js//modal.js"></script>
<script src="../assets/js/index.js"></script>
<script defer src="../assets/js/active.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</body>

</html>