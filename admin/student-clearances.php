<?php
    include_once 'header.php';
    // $users = $db->result('student_details');

    include_once '../connection.php';

    if($conn->connect_error){
        echo $conn->connect_error;
    }
    
    if(!isset($_GET['student_id'])){
        echo "<h1>There's an error while viewing details.</h1>";
    }else{
        $student_id = $_GET['student_id'];

        $list_of_clearance = $db->result('view_clearance','student_id = "'.$student_id.'"');

        $sql = "SELECT * FROM student_details WHERE student_id = '$student_id'";
        $students = $conn->query($sql) or die($conn->error);
        $row = $students->fetch_assoc();

        $student_id = $row['student_id'];
        $student_first_name = $row['student_first_name'];
        $student_last_name = $row['student_last_name'];
    }
    
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
                    <h1>Student Clearance</h1>
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
                
    
            </div>

            

            
                
                <!-- -------------  TABLE OF STUDENT INFORMATION -------------- -->
                <div class="recent-orders-student">
                    <div class="add-button-container">
                        <div class="clearance-view-header">
                            <a href="student_view.php?details=<?= $student_id?>">
                                <button id="back-button-to-student">
                                    <span class="material-symbols-sharp">arrow_back</span>
                                </button>
                            </a>
                            <div class="h2-container">
                                <h2><?= $student_first_name." ".$student_last_name; ?></h2>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                    <div class="table-container">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>School year and sem</th>
                                    <th>Clearance Type</th>
                                    <th>Status</th>
                                    <th>Remarks</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($list_of_clearance as $clearance):?>
                                <tr>
                                    <td><?= $clearance->school_year_and_sem." ".$clearance->sem_name; ?></td>
                                    <td><?= $clearance->clearance_type_name; ?></td>
                                    <td><?= $clearance->clearance_status ? 'Cleared' : 'Not Cleared';?></td>
                                    <td>Done</td>
                                    <td class="primary table-action-container">
                                    <a class="primary" href="clearance_view.php?student_id=<?= $clearance->student_id?>&clearance_type_id=<?= $clearance->clearance_type_id; ?>&clearance_progress_id=<?= $clearance->clearance_progress_id; ?>">View Details</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                
                </div>
            
            
        </main>
        <!-- ================ END OF MAIN =================== -->

    </div>
        

        









<script>
            $(document).ready(function(){
                $("#register-csv-file-btn").click(function(){
                    if($("#register-csv-file-btn span:nth-child(2)").html() == "arrow_forward_ios"){
                        $("#register-csv-file-btn span:nth-child(2)").html("arrow_back_ios")
                    }else {
                        $("#register-csv-file-btn span:nth-child(2)").html("arrow_forward_ios")
                    }
                    
                    $(".upload-student-csv-container").slideToggle(200)
                })
            })
</script>

        <script type="text/javascript">
            $(document).ready(function(){
                // Check/Uncheck ALl
                $('#checkAll').change(function(){
                    if($(this).is(':checked')){
                        $('input[name="update[]"]').prop('checked',true);
                    }else{
                        $('input[name="update[]"]').each(function(){
                            $(this).prop('checked',false);
                        }); 
                    }
                });
                // Checkbox click
                $('input[name="update[]"]').click(function(){
                    var total_checkboxes = $('input[name="update[]"]').length;
                    var total_checkboxes_checked = $('input[name="update[]"]:checked').length;
                    if(total_checkboxes_checked == total_checkboxes){
                        $('#checkAll').prop('checked',true);
                    }else{
                        $('#checkAll').prop('checked',false);
                    }
                });
            }); 
        </script>
</body>
</html>
