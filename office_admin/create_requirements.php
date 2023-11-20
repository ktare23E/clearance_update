<?php
    include_once 'dbconfig.php';
    include_once 'office_header.php';
    $order_by = "ASC";

    include_once '../connection.php';


    if(!isset($_GET['student_id']) && !isset($_GET['clearance_type_id']) && !isset($_GET['clearance_progress_id'])){
        echo "<h1>There's an error while viewing details.</h1>";
    }else{
        $clearance_type_id = $_GET['clearance_type_id'];
        $clearance_progress_id = $_GET['clearance_progress_id'];
        $student_id = $_GET['student_id'];
            
        $sql = "SELECT * FROM view_clearance WHERE clearance_type_id = '$clearance_type_id' AND clearance_progress_id = '$clearance_progress_id' AND student_id = '".$student_id."'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);

        // echo $sql;
        // die();

        $clearance_type_id = $row['clearance_type_id'];
        $clearance_progress_id = $row['clearance_progress_id'];
        $student_id = $row['student_id'];
        $student_first_name = $row['student_first_name'];
        $student_last_name = $row['student_last_name'];

    
    
    $list_of_clearances = $db->result('requirement_view','student_id ='.$student_id. ' AND status = "Active" AND office_id = '.$_SESSION['office_id'],'requirement_details = "'.$order_by.'"','10');

    $requirement = $db->result('requirement');

    $conn = mysqli_connect('localhost', 'root', '', 'clearance');

    $office_id = $_SESSION['office_id'];
    // $sql = "SELECT * FROM new_signing_offices WHERE office_id = '$office_id'";
    // $result = mysqli_query($conn,$sql);
    // $row = mysqli_fetch_assoc($result);

    // $signing_office_id = $row['signing_office_id'];

    }
?>
    <div class="office-container">
        <?php 
            include_once 'office_navtop.php'
        ?>

    
        <!-- ================ MAIN =================== -->
        <div class="main-requirements-container">
            <div class="first-main-content-container">
            <div class="form signup">
                    <span class="title"><h2>List of Requirements of <?= $student_first_name.' '.$student_last_name;?></h2></span>
                    <table>
                                                <thead>
                                                    <tr>
                                                        <th>Requirements</th>
                                                        <th>Clearance Type</th>
                                                        <th>Clearance Period</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($list_of_clearances as $clearance):?>
                                                    <!-- <?php if($clearance->status == "Active"):?> -->
                                                    <tr>
                                                        <td><?= $clearance->requirement_details; ?></td>
                                                        <td><?= $clearance->clearance_type_name;?></td>
                                                        <td><?= $clearance->school_year_and_sem.' '.$clearance->sem_name; ?></td>
                                                        <td><button data-modal-target="#modal<?= $clearance->requirement_id; ?>" class="update-link" >Edit</button></td>
                                                    </tr>
                                                    <!-- <?php endif; ?> -->
                                                    <div class="modal" id="modal<?= $clearance->requirement_id; ?>">
                                                                <div class="modal-header">
                                                                    <div class="title">Edit Requirement Details</div>
                                                                    <button data-close-button class="close-button">&times;</button>
                                                                </div>
                                                                <div class="form signup">
                                                                    <form action="update_requirement.php" method="POST">
                                                                        <div class="input-field-container">
                                                                            <input type="hidden" name="requirement_id" value="<?= $clearance->requirement_id; ?>">
                                                                            <!-- <div class="input-field sy-sem-select">
                                                                                <input type="hidden" name="signing_office_id" value="<?= $signing_office_id; ?>">
                                                                            </div> -->
                                                                            <div class="input-field sy-sem-select">
                                                                            <select name="clearance_progress_id" id="">
                                                                                    <?php $progression = $db->result('clearance_progress_view','status = "Active"');;?>
                                                                                    <?php foreach($progression as $progress):?>
                                                                                    <?php if($progress->clearance_progress_id == $clearance_progress_id):?> 
                                                                                    <option value="<?= $progress->clearance_progress_id; ?>" selected><?= $progress->school_year_and_sem." ".$progress->sem_name; ?></option>
                                                                                    <?php else:?>
                                                                                        <option value="<?= $progress->clearance_progress_id; ?>"><?= $progress->school_year_and_sem." ".$progress->sem_name; ?></option>
                                                                                    <?php endif;?>
                                                                                    <?php endforeach; ?>
                                                                            </select>
                                                                                <i class="uil uil-angle-down" id="uil-arrow-down"></i>
                                                                            </div>
                                                                            <div class="input-field sy-sem-select">
                                                                                <input type="hidden" name="clearance_id" value="<?= $clearance->clearance_id; ?>">
                                                                                <input type="hidden" name="clearance_status" value="0">
                                                                                <select name="clearance_type_id" id="">
                                                                                        <?php $clearances = $db->result('clearance_type');;?>
                                                                                        <?php foreach($clearances as $clearance_type):?>
                                                                                        <?php if($clearance_type->clearance_type_id == $clearance_type_id):?> 
                                                                                        <option value="<?= $clearance_type->clearance_type_id; ?>" selected><?= $clearance_type->clearance_type_name; ?></option>
                                                                                        <?php else:?>
                                                                                            <option value="<?= $clearance_type->clearance_type_id; ?>"><?= $clearance_type->clearance_type_name; ?></option>
                                                                                        <?php endif;?>
                                                                                        <?php endforeach; ?>
                                                                                </select>
                                                                                <i class="uil uil-angle-down" id="uil-arrow-down"></i>
                                                                            </div>
                                                                            <div class="input-field sy-sem-select">
                                                                                <input type="text" name="student_id" value="<?= $clearance->student_id; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="input-field">
                                                                            <textarea placeholder="Description" name="requirement_details" id="" cols="30" rows="10" required><?= $clearance->requirement_details; ?></textarea>
                                                                        </div>
                                                                        <div class="input-field button">
                                                                            <input type="submit" name="update" value="Edit Requirements">
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                        </div>
                                                    <div id="overlay"></div>
                                                <?php endforeach; ?>
                                                </tbody>
                        </table>
                </div>
                <div class="form signup">
                    <span class="title">
                        <h2>Add new requirements for <?= $student_first_name.' '.$student_last_name; ?></h2>   
                    </span>
                    <form action="insert_requirement.php" method="POST">
                        <div class="input-field-container">
                            <!-- <div class="input-field sy-sem-select">
                                <input type="hidden" name="signing_office_id" value="<?= $signing_office_id; ?>">
                            </div> -->
                            <div class="input-field sy-sem-select">
                                <select name="clearance_progress_id" id="">
                                            <option default>Select School Year and Sem</option>
                                            <?php $semesters = $db->result('clearance_progress_view','status = "Active"');?>
                                            <?php foreach($semesters as $semester):?>
                                            <?php if($semester->clearance_progress_id == $clearance_progress_id):?>  
                                            <option value="<?= $semester->clearance_progress_id; ?>" selected><?= $semester->school_year_and_sem.' '.$semester->sem_name; ?></option>
                                            <?php else:?>
                                                <option value="<?= $semester->clearance_progress_id; ?>" selected><?=$semester->school_year_and_sem.' '.$semester->sem_name; ?></option>
                                            <?php endif;?>
                                            <?php endforeach; ?>
                                    </select>
                                <i class="uil uil-angle-down" id="uil-arrow-down"></i>
                            </div>
                            <div class="input-field sy-sem-select">
                                <input type="hidden" name="clearance_id">
                                <input type="hidden" name="clearance_status" value="0">
                                <select name="clearance_type_id" id="">
                                            <?php $clearances = $db->result('clearance_type');;?>
                                            <?php foreach($clearances as $clearance):?>
                                            <?php if($clearance->clearance_type_id == $clearance_type_id):?> 
                                            <option value="<?= $clearance->clearance_type_id; ?>" selected><?= $clearance->clearance_type_name; ?></option>
                                            <?php else:?>
                                                <option value="<?= $clearance->clearance_type_id; ?>"><?= $clearance->clearance_type_name; ?></option>
                                            <?php endif;?>
                                            <?php endforeach; ?>
                                    </select>
                                <i class="uil uil-angle-down" id="uil-arrow-down"></i>
                            </div>
                            <div class="input-field sy-sem-select">
                                <input type="text" name="student_id" placeholder="Student Id" value="<?= $student_id; ?>" required>
                            </div>
                        </div>
                        <div class="input-field">
                            <textarea placeholder="Description" name="requirement_details" id="" cols="30" rows="10" required></textarea>
                        </div>
                        <div class="input-field button">
                            <input type="submit" name="submit" value="Post Requirements">
                        </div>
                    </form>
                </div>
                <br>

                <!-- <button id="register-csv-file-btn">
                    <span class="material-symbols-sharp">upload_file</span>
                    Bulk Upload Via .csv file
                    <span class="material-symbols-sharp">arrow_forward_ios</span>
                </button> -->
                
                
            
            </div>
            
        </div>

        
    </div>
    
    
    <script src="../assets/js/office_admin_index.js"></script>    

    
        
    <script>
        $('[name="sy_sem_id"]').change(function() {
            $('[name="sy_sem_id2"]').val($('[name="sy_sem_id"]').val())
        })
    </script>

    

    
</body>
</html>
