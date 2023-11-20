<?php
include_once 'header.php';
// $users1 = $db->result('office');
// $users = $db->result('offices');


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
                <h1>Clearance</h1>
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
                        <a href="clearance.php">
                            <button id="back-button-to-office">
                                <span class="material-symbols-sharp">arrow_back</span>
                            </button>
                        </a>

                    </div>
                    <span class="title">Add New Clearance</span>

                    <form action="insert_clearance.php" method="POST">
                        <div class="input-field-container">
                            <div class="input-field sy-sem-select">
                                <input type="text" name="student_id" placeholder="Student Id">
                                <i class="uil uil-keyhole-circle icon"></i>
                            </div>
                            <div class="input-field">
                            <i class="uil uil-keyhole-circle icon"></i>
                                <select name="clearance_progress_id" id="">
                                    <option default>Select School Year And Sem</option>
                                    <?php $school_year = $db->result('clearance_progress_view', 'status = "Active"'); ?>
                                    <?php foreach ($school_year as $year) : ?>
                                            <option value="<?= $year->clearance_progress_id; ?>"><?= $year->school_year_and_sem . " " . $year->sem_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <input type="hidden" name="clearance_status" value="1">
                            <div class="input-field">
                            <i class="uil uil-keyhole-circle icon"></i>
                                <select name="clearance_type_id" id="">
                                    <option default>Select Clearance Type</option>
                                    <?php $clearances = $db->result('clearance_type'); ?>
                                    <?php foreach ($clearances as $clearance) : ?>
                                    <option value="<?= $clearance->clearance_type_id; ?>"><?= $clearance->clearance_type_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>           
                        </div>
                        <div class="input-field button">
                            <input type="submit" id="submit" value="Create Clearance">
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

<script defer src="../assets/js//modal.js"></script>
<script src="../assets/js/index.js"></script>
<script defer src="../assets/js/active.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</body>

</html>