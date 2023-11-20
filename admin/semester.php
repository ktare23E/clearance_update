<?php
    include_once 'header.php';
        $users = $db->result('sem');
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
                    <h1>Semester</h1>
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
                            <h2>Semester List</h2>
                    </div>
                        <div>
                            <a href="sem_registration.php">
                                <button id="add-new-student"><span class="material-symbols-sharp">add</span> Semester</button>
                            </a>
                        </div>
                    </div>

                    
                    <div class="table-container">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <!-- <th></th> -->
                                    <th>Semester Name</th>
                                    <!-- <th>Status</th> -->
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user) : ?>
                                <tr>
                                    <!-- <td><input type="checkbox"></td> -->
                                    <td><?= $user->sem_name; ?></td>
                                    <!-- <td><?= $user->status; ?></td> -->
                                    <td class="primary table-action-container">
                                        <a class="update-link" href="edit_sem_info.php?edit=<?= $user->sem_id?>">Edit</a>
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
