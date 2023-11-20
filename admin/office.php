<?php
    include_once 'header.php';
        $users = $db->result('office');
    // $users = $db->result('offices');
    // $users = $db->result('office_account');

    
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
                    <h1>Office</h1>
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
                                <h2>Office List</h2>
                        </div>
                        <div>
                            <a href="office_registration.php">
                                <button id="add-new-student"><span class="material-symbols-sharp">add</span>Office</button>
                            </a>
                        </div>
                    </div>

                    
                    <div class="table-container">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Office Name</th>
                                    <th>Office Email</th>
                                    <th>Office Phone Number</th>
                                    <th>Office Type</th>
                                    <th>Office Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td><?= $user->office_name; ?></td>
                                    <td><?= $user->office_email; ?></td>
                                    <td><?= $user->office_phone_number; ?></td>
                                    <td><?= $user->is_department ? 'Department':'Office';?></td>
                                    <td><?= $user->office_status; ?></td>
                                    <td class="primary table-action-container">
                                        <a class="update-link" href="edit_office_info.php?edit=<?= $user->office_id?>">Edit</a>
                                        <a class="view-link" href="office_view.php?details=<?= $user->office_id?>">View Details</a>
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
