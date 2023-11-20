<?php
    include_once '../connection.php';
    require_once 'student_header.php';

    $id = $_SESSION['student_id'];
    $sql = "SELECT * FROM student_details WHERE student_id = '".$id."'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    $student_id = $row['student_id'];
    $student_profile = $row['student_profile'];
?>

<div class="office-top-container">
    <div class="nav-logo-container">
        <span class="material-symbols-sharp" id="navtop-menu">menu</span>
        <div class="logo-img">
            <img src="../images/nmsc-logo.png" alt="">
            <h2>NMSC <span class="danger">CLEARANCE</span></h2>
        </div>
    </div>
    
    <div class="nav-right-container">
        <div class="nav-middle-container">
            <a href="./student_user_index.php">
                <span class="material-symbols-sharp">home</span>
                <h3>Home</h3>
            </a>
            <a href="./student_clearance.php">
                <span class="material-symbols-sharp">inventory</span>
                <h3>Clearance</h3>
            </a>
            <a href="../logout_student.php">
                <span class="material-symbols-sharp">receipt_long</span>
                <h3>Logout</h3>
            </a>
        </div>
        
        <div class="theme-toggler">
            <span class="material-symbols-sharp active">light_mode</span>
            <span class="material-symbols-sharp">dark_mode</span>
        </div>

        
        <div class="profile" id="show-profile-tap">
            <div class="profile">
                <div class="info">
                    <p>Hello, <b><?php if($_SESSION['student_first_name'] == strtoupper('Phoebe') && $_SESSION['student_last_name'] == strtoupper('Ladua')) {
                        echo 'I love you'.' '. $_SESSION['student_first_name'];
                    }elseif ($_SESSION['student_id']){
                        echo $_SESSION['student_first_name'];
                    } ?></b></p>
                    <small class="text-muted">Student</small>
                </div>
                <?php if($student_profile == ""){
                    echo '<div class="profile-photo">
                    <img src="../images/default.png" alt=""> </div>';
                }else{
                    echo '<div class="profile-photo">
                    <img src="../admin/uploads/'.$student_profile.'" alt=""> </div>';
                }
                ?>
            </div>
            <div class="profile-tap">
                <a href="student_profile.php">
                    <span class="material-symbols-sharp">receipt_long</span>
                    <h3>Profile</h3>
                </a>

                <button class="change-password" data-modal-target="#change-password">
                    <span class="material-symbols-sharp">lock</span>
                    <h3>Password</h3>
                </button>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="change-password">
    <div class="modal-header">
        <div class="title">Change Your Password</div>
        <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="modal-body">
        <form action="change_password.php" method="POST" class="form">
            <div class="input-field" style="margin-top: 0px;margin-bottom:20px">
                <input type="hidden" name="student_id" value="<?= $student_id; ?>">
                <input type="password" name="student_password" class="password" placeholder="Enter your new password" required> <!-- INPUT FIELD FOR PASSWORD -->
                <i class="uil uil-lock icon"></i>
                <i class="uil uil-eye-slash showHidePw"></i>
            </div>
            <input type="submit" name="update" value="Change">
        </form>
    </div>
</div>
<div id="overlay" class=""></div>





