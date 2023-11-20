<?php

    include_once '../connection.php';
    include_once 'student_header.php';
    $id = $_SESSION['student_id'];
    $sql = "SELECT * FROM student_details WHERE student_id = '".$id."'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    $student_id = $row['student_id'];
    $student_profile = $row['student_profile'];
?>
    <div class="office-container">
        <?php 
            include_once 'student_navtop.php'
        ?>
        
        <!-- ================ MAIN =================== -->
        <div class="office-main-container">
            <div class="first-div-container">
                <div style="width: 100%;"> 
                    <h3 style="font-size: 2.5rem;text-align:center">Your Personal Information</h3>
                </div>
            </div>

            <div class="student-profile-container">
                <div class="profile-top-container">
                    <?php 
                        if($student_profile == ""){
                            echo '<div class="student-image" style="position: relative;">
                            <img src="../images/default.png" alt="">
                            </div>';
                        }else{
                            echo '<div class="student-image" style="position: relative;">
                            <img src="../admin/uploads/'.$student_profile.'" alt="">
                            </div>';
                        }
                    ?>
                    <div class="name-student">
                        <h1 style="font-size:32px;font-weight:500;white-space:nowrap"><?php if ($_SESSION['student_id']){
                        echo $_SESSION['student_first_name'].' '.$_SESSION['student_middle_name'].' '.$_SESSION['student_last_name'];} ?></h1>
                        <h3 style="font-size: 1.5rem;" class="text-muted"><?php if($_SESSION['student_id']){
                            echo $_SESSION['student_id'];
                        } ?></h3>
                    </div>
                    <button id="open-change-profile">Change Profile</button>
                    <form class="upload-profile-pic" action="update_profile.php" method="post" enctype="multipart/form-data">
                        <label for="">Change profile image:</label>
                        <input type="file" id="profile-image-input" name="profile_image" accept="image/*" />
                        <button type="submit">Update Profile</button>
                    </form>

                </div>
                <div class="profile-main-info-container">
                    
                    <div class="student-data-container">
                        <h3 class="text-muted">Gender</h3>
                        <h4><?php if($_SESSION['student_id']){
                            echo $_SESSION['student_gender'];
                        } ?></h4>
                    </div>
                    <div class="student-data-container">
                        <h3 class="text-muted">Year level</h3>
                        <h4><?php if($_SESSION['student_id']){
                            echo $_SESSION['student_year'];
                        } ?></h4>
                    </div>
                    
                    <div class="student-data-container">
                        <h3 class="text-muted">Department</h3>
                        <h4><?php if($_SESSION['student_id']){
                            echo $_SESSION['office_name'];
                        } ?></h4>
                    </div>
                    <div class="student-data-container">
                        <h3 class="text-muted">Course</h3>
                        <h4><?php if($_SESSION['student_id']){
                            echo $_SESSION['course_name'];
                        } ?></h4>
                    </div>
                    <div class="student-data-container">
                        <h3 class="text-muted">Email</h3>
                        <h4><?php if($_SESSION['student_id']){
                            echo $_SESSION['student_email'];
                        } ?></h4>
                    </div>
                    <div class="student-data-container">
                        <h3 class="text-muted">Username</h3>
                        <h4><?php if($_SESSION['student_id']){
                            echo $_SESSION['student_id'];
                        } ?></h4>
                    </div>
                </div>
                
            </div>

        </div>
    </div>
    
    
    <script src="../assets/js/student_index.js"></script>  
    
</body>
</html>
