<?php
    include_once 'office_header.php';
    $office_id = $_SESSION['office_id'];
    include_once '../connection.php';

    $query = "SELECT * FROM office WHERE office_id = '$office_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    $is_department = $row['is_department'];

?>
    <div class="office-container">
        <?php 
            include_once 'office_navtop.php'
        ?>
        
        <!-- ================ MAIN =================== -->
        <div class="office-main-container">
            <div class="first-div-container">
                <div>
                    <h3 style="font-size: 2.5rem;">Students Panel</h3>
                </div>
            </div>
            <?php 
                if($_SESSION['office_id'] == $office_id && $is_department == 1){
                    $query = "SELECT COUNT(*) FROM student_details WHERE office_id = '$office_id'"; 
                    $result = mysqli_query($conn, $query); 
    
                    $total_users = mysqli_fetch_array($result); 
    
                    mysqli_close($conn); 
                }else{
                    $query = "SELECT COUNT(*) FROM student"; 
                    $result = mysqli_query($conn, $query); 
    
                    $total_users = mysqli_fetch_array($result); 
                }
            ?>

            <div class="student-panel-insights-container">
                <div class="student-insight-container">
                    <div class="upper-insight">
                        <div class="left-logo-insight">
                            <span class="material-symbols-sharp">groups_2  </span>
                        </div>
                        <div class="right-insights">
                            <h3 class="success">Active students</h3>
                            <h2><?= $total_users[0];?></h2>
                        </div>
                        
                    </div>
                </div>

                <!-- <div class="student-insight-container">
                    <div class="upper-insight">
                        <div class="left-logo-insight">
                            <span class="material-symbols-sharp">groups_2  </span>
                        </div>
                        <div class="right-insights">
                            <h3 class="success">Active students <span class="text-muted">under you</span>  </h3>
                            <h2><?= $total_users[0];?></h2>
                        </div>
                        <div class="right-insights">
                            <h3>Insight data 1</h3>
                            <h2>1,234</h2>
                        </div>
                        <div class="right-insights">
                            <h3>Insight data 2</h3>
                            <h2>1,234</h2>
                        </div>
                    </div>
                    <div class="lower-insight">
                        <small>Ajinomoto of sardines</small>
                    </div>
                </div> -->
            </div>

            <div class="student-table-data-container">
                <h2>Lists of students</h2>
                <div class="table-container">
                <table id="example" class="display" style="width:100%">
                        <thead>
                                <tr>
                                    <!-- <input type="checkbox" id="checkAll" style='
                                        display:block;background-color:black; appearance:auto;
                                        position:absolute;
                                        top:150px;
                                        left:45px;
                                        z-index:10;
                                        '/> -->
                                    <!-- <th> Select All</th> -->
                                    <th>Student ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Year Level</th>
                                    <th>Course</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                        </thead>
                        <tbody>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
    <script src="../assets/js/office_admin_index.js"></script> 
    
    <script>
            $(document).ready(function () {
                $('#example').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: 'office_server_processing.php',
                });
        });
    </script>


</body>
</html>
