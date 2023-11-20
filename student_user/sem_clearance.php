<?php
    include_once '../dbconnect.php';
    include_once 'student_header.php';
    include_once '../connection.php';


    if(!isset($_GET['clearance_progress_id']) && !isset($_GET['student_id']) && !isset($_GET['clearance_type_id'])){
        echo "<h1>There's an error while viewing details.</h1>";
    }else{
        $clearance_progress_id = $_GET['clearance_progress_id'];
        $clearance_type_id = $_GET['clearance_type_id'];
        $student_id = $_GET['student_id'];
        
        $list_of_clearances = $db->result('requirement_view', 'clearance_progress_id = '.$clearance_progress_id.' AND student_id = "'.$student_id.'" AND clearance_type_id = '.$clearance_type_id.'');

        $query = "SELECT * FROM view_clearance WHERE student_id = '".$student_id."' AND clearance_type_id = ".$clearance_type_id." AND clearance_progress_id = ".$clearance_progress_id."";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);

        $school_year_and_sem = $row['school_year_and_sem'];
        $sem_name = $row['sem_name'];

    }
?>
    <div class="office-container">
        <?php 
            include_once 'student_navtop.php';
        ?>
        
<div class="clearance-view-details-container">
    <h1 style="text-align: center;">Your clearance for <br> <?= $school_year_and_sem.' '.$sem_name; ?></h1>
    <a href="student_clearance.php" style="
        display:inline-block;
        background-color:var(--color-primary-variant);
        width:fit-content;
        padding: 6px 20px;
        color:white;
        border-radius: var(--border-radius-1);
        margin-bottom: 5px; 
        display:flex;
        align-items:center;
        font-size: 1rem;
        ">
            <span class="material-symbols-sharp" style="font-size: 1rem;">arrow_back_ios</span>
            Back
    </a>
    <div class="clearance-section-container">
                            
                                    <div class="clearance-header-bar-container">
                                        <h3 class="clearance-view" style="background-color:#2ad2ec">CLEARANCE DETAILS - SIGNING OFFICES STATUS</h3>
                                    </div>
                                    <div class="clearance-details-container">
                                        
                                        <div class="clearance-details-table-container">
                                            <table id="the-table">
                                                <thead>
                                                    <tr>
                                                        <th>SIGNING OFFICE</th>
                                                        <th>Requirement</th>
                                                        <th>STATUS</th>
                                                        <th>DATE SIGNED(Y-M-D)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($list_of_clearances as $clearance):?>
                                                    <tr>
                                                    <td><?= $clearance->office_name;?></td>
                                                    <td><?= $clearance->requirement_details;?></td>
                                                    <td><?= $clearance->is_complied ? 'Approved' : 'Not Cleared';?></td>
                                                    <td><?= $clearance->date_cleared;?></td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
</div>
                            

<script src="../assets/js/student_index.js"></script> 
    
<script>
    let status = document.querySelectorAll("#the-table tbody tr td:nth-child(3)");
    for(let i = 0; i < status.length; i++){
        if(status[i].innerHTML == "Approved"){
            status[i].style.color = "green";
        }else{
            status[i].style.color = "orange";
        }
    }
</script>
</body>
</html>
    