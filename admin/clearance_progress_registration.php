<?php
include_once 'header.php';
include_once '../connection.php';

// $clearance_progress_id = $_GET['clearance_progress_id'];

// $sql = "SELECT * FROM clearance_progress WHERE clearance_progress_id = '$clearance_progress_id'";
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);

// $sy_sem_id = $row['sy_sem_id'];
// $sem_id = $row['sem_id'];
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
                <h1>Clearance Period</h1>
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
                        <a href="clearance_progress.php">
                            <button id="back-button-to-office">
                                <span class="material-symbols-sharp">arrow_back</span>
                            </button>
                        </a>

                    </div>
                    <span class="title">Add New Clearance Period</span>

                    <form action="insert_clearance_progress.php" method="POST">
                        <div class="input-field-container">
                            <div class="input-field">
                                <i class="uil uil-bolt"></i>
                                <select name="sy_sem_id" id="">
                                    <option default>Select School Year</option>
                                    <?php $school_year = $db->result('sy_sem'); ?>
                                    <?php foreach ($school_year as $year) : ?>
                                            <option value="<?= $year->sy_sem_id; ?>"><?= $year->school_year_and_sem; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <input type="hidden" name="clearance_status" value="1">
                            <div class="input-field">
                                <i class="uil uil-bolt"></i>
                                <select name="sem_id" id="">
                                    <option default>Select Semester</option>
                                    <?php $semesters = $db->result('sem'); ?>
                                    <?php foreach ($semesters as $semester) : ?>
                                            <option value="<?= $semester->sem_id; ?>"><?= $semester->sem_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="input-field">
                                <i class="uil uil-bolt"></i>
                                <select name="status" id="">
                                    <option value="Status">Status</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-field button">
                            <input type="submit" id="submit" value="Create Clearance Progress">
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