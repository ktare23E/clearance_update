<?php
    include_once 'header.php';


        // $conn = mysqli_connect('localhost', 'root', '', 'clearance')
        if(!isset($_GET['clearance_type_id'])){
            $users = $db->result('new_signing_offices','status = "Active"');
        }else{

            if($_GET['clearance_type_id'] == ""){
                // $users = $db->result('new_signing_offices');
            $users = $db->result('new_signing_offices','status = "Active"');

            }else{
                $id = $_GET['clearance_type_id'];
                $users = $db->result('new_signing_offices','status = "Active"');
            }
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
                    <h1>Signing Offices</h1>
                    <div class="theme-toggler">
                        <span class="material-symbols-sharp active">light_mode</span>
                        <span class="material-symbols-sharp">dark_mode</span>
                    </div>
                    <div class="profile">
                        <div class="info">
                            <p>Hey, <b>Daniel</b></p>
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
                            <h2>Signing Offices List</h2>
                    </div>
                        <div>
                            <a href="signing_office_registration.php">
                                <button id="add-new-student">
                                <span class="material-symbols-sharp">add</span>Signing Office</button>
                            </a>
                        </div>
                    </div>
                                <!-- <div>
                                    <label for="">Filter via Clearance Type</label>
                                    <select name="clearance_type_id" id="clearance_type">
                                            <option default>Select Clearance Type</option>
                                            <option value="">All</option>
                                            <?php $signings = $db->result('clearance_type');?>
                                            <?php foreach($signings as $signing):?>
                                            <?php if($signing->clearance_type_id == $clearance_type_id):?>  
                                            <option value="<?= $signing->clearance_type_id; ?>"><?= $signing->clearance_type_name; ?></option>
                                            <?php else:?>
                                                <option value="<?= $signing->clearance_type_id; ?>"><?= $signing->clearance_type_name; ?></option>
                                            <?php endif;?>
                                            <?php endforeach; ?>
                                    </select>
                        </div> -->
                    
                    <div class="table-container">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Office Name</th>
                                    <th>School Year and Sem</th>
                                    <th>Status</th>
                                    <th>Admin Name</th>
                                    <th>Clearance Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td><?= $user->office_name; ?></td>
                                    <td><?= $user->school_year_and_sem.' '.$user->sem_name; ?></td>
                                    <td><?= $user->status;?></td>
                                    <td><?= $user->admin_name; ?></td>
                                    <td><?= $user->clearance_type_name; ?></td>
                                    <td class="primary table-action-container">
                                        <a class="update-link" href="edit_signing_office_info.php?edit=<?= $user->signing_office_id;?>">Edit</a>
                                            <!-- <input type="hidden" name="student_id" value="<?= $user->student_id; ?>"> -->
                                            <!-- <button type="submit" class="danger delete" name="delete" data-id="<?= $user->student_id; ?>">
                                                <span class="material-symbols-outlined">delete</span>
                                            </button> -->
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
        // on change event for the select tag
        $('#clearance_type').on('change', function(){
            // get the value of the selected option
            let clearance_type_id = $(this).val();
            // redirect to the page with the selected option
            window.location.href = `signing_office.php?clearance_type_id=${clearance_type_id}`;
        })
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
