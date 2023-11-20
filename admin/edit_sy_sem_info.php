<?php
    include_once 'header.php';
    include_once '../connection.php';


    if(!isset($_GET['edit'])){
        echo "<h1>There's an error while viewing details.</h1>";
    }else{
        $id = $_GET['edit'];
        $sql = "SELECT * FROM sy_sem WHERE sy_sem_id = '$id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);

        $sy_sem_id = $row['sy_sem_id'];
        $school_year_and_sem = $row['school_year_and_sem'];
    
        

    

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
                        <div class="back-button action-button-container">
                            <a href="sy_sem.php">
                                <button id="back-button-to-student">
                                    <span class="material-symbols-sharp">arrow_back</span>
                                </button>
                            </a>
                        </div>
                        <span class="title">Edit School Year Information</span>

                    <form action="update_sy_sem.php" method="POST">
                        <div class="input-field-container">
                            <div class="input-field">
                                <input type="hidden" name="sy_sem_id" value="<?= $sy_sem_id?>">
                                <input id="my-input" type="text" name="school_year_and_sem" placeholder="School Year" required value="<?php echo $school_year_and_sem; ?>">
                                <i class="uil uil-user"></i>
                                <p class="input-warning danger">Input numbers and hyphen only</p>
                            </div>
                            <!-- <div class="input-field">
                                <label for="">Status</label>
                                    <select name="status" id="">
                                        <?php if($status === 'Active'):?>
                                        <option value="<?= $status; ?>" selected><?= $status; ?></option>
                                        <?php else:?>
                                                <option value="Active">Active</option>
                                            <?php endif;?>
                                        <?php if($status === 'Inactive'):?>
                                        <option value="<?= $status; ?>" selected><?= $status; ?></option>
                                        <?php else:?>
                                                <option value="Inactive">Inactive</option>
                                            <?php endif;?>
                                    </select>
                            </div> -->
                            <!-- <div class="input-field">
                                <label for="">Semester</label>
                        <select name="sem_id" id="">
                                <?php $semesters = $db->result('sem');?>
                                <?php foreach($semesters as $semester):?>
                                    <option value="<?= $semester->sem_id ?>" <?= ($semester->sem_name == $sem_name)? "selected" : "" ?>><?= $semester->sem_name; ?></option>
                                <?php endforeach; ?>
                        </select>
                            </div> -->
                            <!-- <div class="input-field">
                                    <label for="">Semester</label>
                                    <select name="sem_id" id="" required>
                                    
                                    <option value="<?= $sem_id;?>"
                                        <?php
                                                if($sem_name == '1st Semester'){
                                                    echo "selected";
                                                }
                                        ?>
                                    >1st Semester</option>
                                    <option value="<?= $sem_id;?>"
                                        <?php
                                                if($sem_name == '2nd Semester'){
                                                    echo "selected";
                                                }
                                        ?>
                                    >2nd Semester</option>
                                    <option value="<?= $sem_id;?>"
                                        <?php
                                                if($sem_name == 'Trimester'){
                                                    echo "selected";
                                                }
                                        ?>
                                    >Trimester</option>
                                    <option value="<?= $sem_id;?>"
                                        <?php
                                                if($sem_name == 'Summer'){
                                                    echo "selected";
                                                }
                                        ?>
                                    >Summer</option>
                                </select>
                            </div> -->
                        </div>
                        <div class="input-field button">
                            <input type="submit" name="update" value="Update School Year">
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
    <script>

        const inputElement = document.getElementById("my-input");
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

</body>
</html>


        