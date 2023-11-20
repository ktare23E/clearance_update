<?php
    include_once 'header.php';

        // $users = $db->result('office_account');
    $users = $db->result('view_admin_offices');
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

            <h1>Office Account</h1>

            <div class="form-and-table-container">
                
                <!-- -------------  TABLE OF STUDENT INFORMATION -------------- -->
                <div class="recent-orders-student">
                    <div class="add-button-container">
                        <div>
                            <a href="office_account_registration.php">
                                <button id="add-new-student">Add new office account</button>
                            </a>
                        </div>
                    </div>

                    <div class="h2-container">
                            <h2>Office Account List</h2>
                    </div>

                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Office Name</th>
                                <th>Office Account Username</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $user->admin_first_name; ?></td>
                                <td><?= $user->admin_last_name; ?></td>
                                <td><?= $user->admin_username;?></td>
                                <td><?= $user->office_name;?></td>
                                <td class="primary table-action-container">
                                    <a href="edit_office_account_info.php?edit=<?= $user->office_account_id?>">Update</a>
                                    <a href="office_account_view.php?details=<?= $user->office_account_id?>">View Details</a>
                                        <!-- <input type="hidden" name="student_id" value="<?= $user->student_id; ?>"> -->
                                        <!-- <button type="submit" class="danger delete" name="delete" data-id="<?= $user->student_id; ?>">
                                            <span class="material-symbols-outlined">delete</span>
                                        </button> -->
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <tfoot>
                            <tr>
                                <th>Office Name</th>
                                <th>Office Account Username</th>
                                <th>Office Account Status</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            
        </main>
        <!-- ================ END OF MAIN =================== -->
    </div>
<!-- <script>
            $(document).ready(function(){
                $('.delete').on('click',function(){
                    let student_id = $(this).attr('data-id');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: 'post',
                                url: 'deleteinfo.php',
                                data: {student_id:student_id},
                                success: function(response){
                                    if(response === "Deleted"){
                                        Swal.fire(
                                            'Deleted!',
                                            'Your file has been deleted.',
                                            'success'
                                        )
                                    }else{
                                        Swal.fire(
                                            'Error',
                                            'Error deleting data.',
                                            'error'
                                        )
                                    }
                                    
                                    setTimeout(() => { 
                                        location.reload(true);
                                    }, 1000);
                                } 
                            })
                        }
                    })
                })
            })
        </script> -->
    
    <!-- <script src="../assets/js/student-info.js"></script> -->
    
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
