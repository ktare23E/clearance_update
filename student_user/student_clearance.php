<?php
    include_once 'student_header.php';

    include_once '../dbconnect.php';

    $list_of_clearance = $db->result('view_clearance','student_id = "'.$_SESSION['student_id'].'"');
?>
    <div class="office-container">
        <?php 
            include_once 'student_navtop.php'
        ?>
    

                                <div class="clearance-section-container">
                                    <div class="clearance-header-bar-container">
                                        <h3>CLEARANCE INFORMATION LOGS</h3>
                                        <div class="clearance-info-table-container">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>School Year and Sem.</th>
                                                        <!-- <th>Student Year</th> -->
                                                        <th>Clearance Type</th>
                                                        <th>STATUS</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($list_of_clearance as $clearance) : ?>
                                                    <tr>
                                                        <td><?= $clearance->school_year_and_sem.' '.$clearance->sem_name; ?></td>
                                                        <!-- <td><?= $clearance->student_year?></td> -->
                                                        <td><?= $clearance->clearance_type_name; ?></td>
                                                        <td><?= $clearance->clearance_status ? 'Cleared' : 'Not Cleared';?></td>
                                                        <td class="primary table-action-container">
                                                            <a class="primary view-link" href="sem_clearance.php?clearance_progress_id=<?= $clearance->clearance_progress_id?>&student_id=<?=$clearance->student_id; ?>&clearance_type_id=<?= $clearance->clearance_type_id; ?>">View Details</a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
    
    <script src="../assets/js/student_index.js"></script> 
    
</body>
</html>
