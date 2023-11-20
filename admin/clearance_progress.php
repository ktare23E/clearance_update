<?php
    include_once 'header.php';
        // $users = $db->result('office');
    // $users = $db->result('offices');
    // $users = $db->result('office_account');
    $users = $db->result('clearance_progress_view');
    
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
                    <h1>Clearance Period</h1>
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
                
                <!-- -------------  TABLE OF STUDENT INFORMATION -------------- -->
                <div class="recent-orders-student">
                    <div class="add-button-container">
                        <div class="h2-container">
                                <h2>Clearance Period List</h2>
                        </div>
                        <div>
                            <a href="clearance_progress_registration.php">
                                <button id="add-new-student"><span class="material-symbols-sharp">add</span> Clearance Progress</button>
                            </a>
                        </div>
                    </div>
                    <!-- <div class="bulk-actions-container">
                            <h3 style="text-align: center;">Bulk Update</h3>
                            <div class="bulk-action">
                                <button type="button" id="active" >Set as Active</button>
                            </div>
                            <div class="bulk-action">
                                <button type="button" id="inactive" onclick="">Set as Inactive</button>
                            </div>
                    </div> -->

                    
                    <div class="table-container">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Shool Year</th>
                                    <th>Semester</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td><?= $user->school_year_and_sem; ?></td>
                                    <td><?= $user->sem_name; ?></td>
                                    <td><?= $user->status; ?></td>
                                    <td class="primary table-action-container">
                                        <a class="update-link" href="edit_clearance_progress.php?edit=<?= $user->clearance_progress_id; ?>">Edit</a>
                                        <!-- <a href="office_view.php?clearance_progress_id=<?= $user->clearance_progress_id; ?>">View Details</a> -->
                                        <a class="lock-period" href="lock_requirements.php?clearance_progress_id=<?= $user->clearance_progress_id; ?>?"><button type="button">Lock Requirements</button></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
            
        </main>
        <!-- ================ END OF MAIN =================== -->
    </div>

    <script>
        //jquery onclick event for update button
        $(document).on("click", '#active', function(){
            let list_sy_sem_id = [];
            let list_inputs = $('.row')
            list_inputs.map((index,elem,arr) => {
                let is_check = $(elem).prop("checked")
                if(is_check == true ){
                    list_sy_sem_id.push($(elem).attr("sy_sem_id"))
                }
            });
            console.log(list_sy_sem_id);
            $.ajax({
                url: "sy_sem_update_status.php",
                method: "POST",
                data: {
                    list_sy_sem_id:list_sy_sem_id,
                    status:'Active'
                },
                success: (response) =>{
                    $("#checkAll").prop("checked",false);
                    $('#example').DataTable().ajax.reload();
                }
            })
        });
    </script>


    <script defer src="../assets/js//modal.js"></script>
    <script src="../assets/js/index.js"></script>
    <script defer src="../assets/js/active.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
</body>
</html>
