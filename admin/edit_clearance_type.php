<?php
    include_once 'header.php';
    include_once '../connection.php';


    if(!isset($_GET['edit'])){
        echo "<h1>There's an error while viewing details.</h1>";
    }else{
        $id = $_GET['edit'];
        $sql = "SELECT * FROM clearance_type WHERE clearance_type_id = '$id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);

        $clearance_type_id = $row['clearance_type_id'];
        $clearance_type_name = $row['clearance_type_name'];
        $clearance_type_description = $row['clearance_type_description'];
        
    
        

    

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
                    <h1>Clearance Type</h1>
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
                            <a href="clearance_type.php">
                                <button id="back-button-to-student">
                                    <span class="material-symbols-sharp">arrow_back</span>
                                </button>
                            </a>
                        </div>
                        <span class="title">Edit Clearance Type Information</span>

                        <form action="update_clearance_type.php" method="POST">
                            <div class="input-field-container">
                                <div class="input-field">
                                    <input type="hidden" name="clearance_type_id" value="<?= $clearance_type_id?>">
                                    <input type="text" name="clearance_type_name" placeholder="Clearance Type Name" required value="<?php echo $clearance_type_name; ?>">
                                    <i class="uil uil-user"></i>
                                </div>
                                <div class="input-field">
                                    <textarea name="clearance_type_description"  cols="30" rows="10"><?= $clearance_type_description?></textarea>
                                </div>
                            </div>
                            <div class="input-field button">
                                <input type="submit" name="update" value="Update Clearance Type">
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


</body>
</html>


        