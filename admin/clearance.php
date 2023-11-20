<?php
    include_once 'header.php';
    // $users = $db->result('student_details');

    $id = isset($_GET['clearance_type_id']) == true ? $_GET['clearance_type_id'] : '';
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
                    <h1>Clearance</h1>
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
                <!-- <div style="margin-top: 20px;">
                    <button id="show-clearance-insights">
                        <span class="material-symbols-sharp">show_chart</span>
                        Show Clearance Insights
                    </button>
                </div> -->
                
                        <!-- <div>
                                    <label for="">Filter via Clearance Type</label>
                                    <select name="clearance_type_id" id="clearance_type">
                                            <option default>Select Clearance</option>
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




                <div class="recent-orders-student">

                    <div class="add-button-container" style="margin-bottom: 20px;">
                        <div class="h2-container">
                            <h2>On Going Clearance List</h2>
                        </div>
                        <div class="new-student-buttons" style="display:flex;flex-direction:row;gap:5px;justify-content:space-between;align-items:stretch"> 
                            <div>
                                <a href="clearance_registration.php" style="height:100%">
                                    <button id="add-new-student">
                                        <span class="material-symbols-sharp">add</span>Clearance
                                    </button>
                                </a>
                            </div>
                            <!-- <button class="download-csv" data-modal-target="#csv-download-modal">Download CSV</button> -->
                            <!-- <button id="register-csv-file-btn">
                                <span class="material-symbols-sharp">upload_file</span>
                                Register Via .csv file
                                <span class="material-symbols-sharp">arrow_forward_ios</span>
                            </button> -->
                            <div>
                                <div class="upload-student-csv-container">
                                    <form action="clearance_upload_csv.php" method="post" enctype="multipart/form-data" name="upload_csv">
                                        <div class="form-input-file-csv-container">
                                                <label for="input-file">Choose CSV File</label>
                                                <input type="file" name="file" accept=".csv" id="input-file">
                                                <select name="clearance_progress_id" id="">
                                                            <option default>Select Tanduay Select Clearance Progress</option>
                                                            <?php $progressions = $db->result('clearance_progress_view','status="Active"');?>
                                                            <?php foreach($progressions as $progression):?>
                                                            <?php if($progression->clearance_progress_id == $clearance_progress_id):?>  
                                                            <option value="<?= $progression->clearance_progress_id; ?>"><?= $progression->school_year_and_sem.' '.$progression->sem_name; ?></option>
                                                            <?php else:?>
                                                                <option value="<?= $progression->clearance_progress_id; ?>"><?=$progression->school_year_and_sem.' '.$progression->sem_name; ?></option>
                                                            <?php endif;?>
                                                            <?php endforeach; ?>
                                                    </select>
                                                <button type="submit" name="import" class="submit-csv-file-button">
                                                Import
                                                    <span class="material-symbols-sharp">file_upload</span>
                                                </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="table-container">
                        <table id="example" class="display" style="width:100%; ">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Clearance Type Id</th>
                                    <th>School Year and Sem Id</th>
                                    <th>Clearance Id</th>
                                    <th>Student ID</th>
                                    <th>Student First Name</th>
                                    <th>Student Last Name</th>
                                    <th>School Year</th>
                                    <th>Semester</th>
                                    <th>Clearance Type</th>
                                    <th>Clearance Status</th>
                                    <th>Semester Id</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Clearance Type Id</th>
                                    <th>School Year and Sem Id</th>
                                    <th>Clearance Id</th>
                                    <th>Student ID</th>
                                    <th>Student First Name</th>
                                    <th>Student Last Name</th>
                                    <th>School Year</th>
                                    <th>Semester</th>
                                    <th>Clearance Type</th>
                                    <th>Clearance Status</th>
                                    <th>Semester Id</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    
                </div>
            </div>
            
        </main>
        <!-- ================ END OF MAIN =================== -->

    </div>



    <div class="modal" id="csv-download-modal">
        <div class="modal-header">
            <div class="title">CSV Format Guide and Download File</div>
            <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="requirements-modal-body">
            <div>
                <h3 style="margin-bottom: 5px;">Guide for inputting clearance details</h3>
                <img src="../images/clearance guide.png" alt="">
            </div>
            
            <a style="align-self: flex-end;" class="download-csv" href="../csv/clearance_csv_format.csv" download="Clearance Details">Download CSV Format</a>
        </div>
    </div>
    <div id="overlay"></div>




    <script>
        try {
            const openModalButtons = document.querySelectorAll('[data-modal-target]')
            const closeModalButtons = document.querySelectorAll('[data-close-button]')
            const overlay = document.getElementById('overlay')

            openModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                const modal = document.querySelector(button.dataset.modalTarget)
                openModal(modal)
            })
            })

            overlay.addEventListener('click', () => {
            const modals = document.querySelectorAll('.modal.active')
            modals.forEach(modal => {
                closeModal(modal)
            })
            })

            closeModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                const modal = button.closest('.modal')
                closeModal(modal)
            })
            })

            function openModal(modal) {
            if (modal == null) return
            modal.classList.add('active')
            overlay.classList.add('active')
            }

            function closeModal(modal) {
            if (modal == null) return
            modal.classList.remove('active')
            overlay.classList.remove('active')
            }
        } catch (error) {
            console.log(error);
        }
        


    </script>


    
        

    <script>
            $(document).ready(function () {
            $('#example').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'server_clearance.php?clearance_type_id='<?=$id?>,
                columnDefs: [ 
                    { target: 1, visible: false, searchable: false, },
                    { target: 2, visible: false, },
                    { target: 3, visible: false, },
                    { target: 11, visible: false, },
                    { 
                        target: 10,
                        render: function (data, type, row) {
                            return (data==1 ? 'Cleared' : 'Not Cleared');
                        },
                    }
                ],
                initComplete: function() {
                    this.api().columns().every(function() {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search(val, true, false)
                                    .draw();

                                console.log(column.search());
                            });

                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function(d, j) {
                                select.append(
                                    '<option value="' + d + '">' + d + '</option>'
                                );
                            });
                    });
                }
            
            });
        });
    </script>

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

    <script>
        // on change event for the select tag
        $('#clearance_type').on('change', function(){
            // get the value of the selected option
            let clearance_type_id = $(this).val();
            // redirect to the page with the selected option
            window.location.href = `clearance.php?clearance_type_id=${clearance_type_id}`;
        })
    </script>
    
    <!-- <script src="../assets/js/student-info.js"></script> -->
    
    <script defer src="../assets/js//modal.js"></script>
    <script src="../assets/js/index.js"></script>
    <script defer src="../assets/js/active.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="../assets/js/update.js"></script> -->

    <script>
        $(document).ready(function () {
            $("#show-clearance-insights").click(function(){
                $("#clearance-insights").slideToggle()
            })
        });


    </script>
</body>
</html>
