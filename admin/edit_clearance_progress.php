<?php
include_once 'header.php';

include_once '../connection.php';


if (!isset($_GET['edit'])) {
    echo "<h1>There's an error while viewing details.</h1>";
} else {
    $clearance_progress_id = $_GET['edit'];
    $sql = "SELECT * FROM clearance_progress_view WHERE clearance_progress_id = '$clearance_progress_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $clearance_progress_id = $row['clearance_progress_id'];
    $sy_sem_id = $row['sy_sem_id'];
    $status = $row['status'];
    $sem_id = $row['sem_id'];
    $sem_name = $row['sem_name'];


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

            <h1>Clearance Progress</h1>

            <div class="form-and-table-container">

                <!-- -------------  STUDENT REGISTRATION FORM -------------- -->
                <div class="student-registration">
                    <div class="form signup">
                        <div class="back-button action-button-container">
                            <a href="clearance_progress.php">
                                <button id="back-button-to-student">
                                    <span class="material-symbols-sharp">arrow_back</span>
                                </button>
                            </a>
                        </div>
                        <span class="title">Edit Clearance Progress Information</span>

                        <form action="update_clearance_progress.php" method="POST">
                            <div class="input-field-container">
                                <div class="input-field">
                                    <input type="hidden" name="clearance_progress_id" value="<?= $clearance_progress_id; ?>">
                                    <label for="">Select School Year and Sem</label>
                                    <select name="sy_sem_id" id="">
                                        <option default>Select School Year</option>
                                        <?php $semesters = $db->result('sy_sem'); ?>
                                        <?php foreach ($semesters as $semester) : ?>
                                            <?php if ($semester->sy_sem_id == $sy_sem_id) : ?>
                                                <option value="<?= $semester->sy_sem_id; ?>" selected><?= $semester->school_year_and_sem; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $semester->sy_sem_id; ?>"><?= $semester->school_year_and_sem; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="input-field">
                                    <label for="">Semester</label>
                                    <select name="sem_id" id="">
                                        <?php $semesters = $db->result('sem'); ?>
                                        <?php foreach ($semesters as $semester) : ?>
                                            <option value="<?= $semester->sem_id ?>" <?= ($semester->sem_name == $sem_name) ? "selected" : "" ?>><?= $semester->sem_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="input-field">
                                    <label for="">Status</label>
                                    <select name="status" id="">
                                        <?php if ($status === 'Active') : ?>
                                            <option value="<?= $status; ?>" selected><?= $status; ?></option>
                                        <?php else : ?>
                                            <option value="Active">Active</option>
                                        <?php endif; ?>
                                        <?php if ($status === 'Inactive') : ?>
                                            <option value="<?= $status; ?>" selected><?= $status; ?></option>
                                        <?php else : ?>
                                            <option value="Inactive">Inactive</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="input-field button">
                                <input type="submit" name="update" value="Update Clearance Progress">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- -------------  END OF REGISTRATION -------------- -->
            </div>

        </main>
        <!-- ================ END OF MAIN =================== -->

    </div>

<?php } ?>

<script defer src="../assets/js//modal.js"></script>
<script src="../assets/js/index.js"></script>
<script defer src="../assets/js/active.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>