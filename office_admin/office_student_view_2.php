<?php
    include_once 'office_header.php';


    include_once '../connection.php';

    if($conn->connect_error){
        echo $conn->connect_error;
    }
    
    if(!isset($_GET['details'])){
        echo "<h1>There's an error while viewing details.</h1>";
    }else{
        $id = $_GET['details'];
        $sql = "SELECT * FROM student_details WHERE student_id = '$id'";
        $students = $conn->query($sql) or die($conn->error);
        $row = $students->fetch_assoc();
    }
    
    
?>

    <div class="office-container">
        <?php 
            include_once 'office_navtop.php'
        ?>
        
        <!-- ================ MAIN =================== -->
        <div class="office-main-container">
            <div class="first-div-container">
                <div>
                    <h3 style="font-size: 2rem;">Student profile</h3>
                </div>
            </div>

            <div class="student-profile-container">
                <?php 
                    if($row['student_profile'] == ""){
                        echo '<div class="left-photo-container" ><img src="../images/default.png" alt=""></div>';
                    }else{
                        echo '<div class="left-photo-container" ><img src="../admin/uploads/'.$row['student_profile'].'" alt=""></div>';
                    }
                ?>
                <div class="right-student-info-container">
                    <div class="student-name-container">
                        <h4 style="font-size: 2rem;"><?= $row['student_first_name'].' '.$row['student_last_name']?></h4>
                        <p style="margin-top: -5px;color:var(--color-primary)"><?= $row['student_email'];?></p>
                    </div>
                    <div class="student-data-container">
                        <div class="data">
                            <h5>Student Id :</h5>
                            <h4><?= $row['student_id']; ?></h4>
                        </div>
                        <div class="data">
                            <h5>Course :</h5>
                            <h4><?= $row['course_name']; ?></h4>
                        </div>
                        <div class="data">
                            <h5>Year :</h5>
                            <h4><?= $row['student_year']; ?></h4>
                        </div>
                        <div class="data">
                            <h5>Department :</h5>
                            <h4><?= $row['office_name']; ?></h4>
                        </div>
                        <div class="data">
                            <h5>Gender :</h5>
                            <h4><?= $row['student_gender']; ?></h4>
                        </div>
                        <div class="data">
                            <h5>Username :</h5>
                            <h4><?= $row['student_id']?></h4>
                        </div>
                        <div class="data">
                            <h5>Status :</h5>
                            <h4><?= $row['student_status']?></h4>
                        </div>
                    </div>
                    <div class="student-buttons-container">
                        <a href='student_clearances.php?student_id=<?= $row['student_id']; ?>'><button>View Clearance</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="../assets/js/office_admin_index.js"></script> 

</body>
</html>
