<?php
include_once 'header.php';
// $users = $db->result('student_details');


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
                <h1>Student Account</h1>
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

                <div class="h2-container">
                    <h2>Students List</h2>
                </div>

                <div class="new-student-buttons" style="display:flex;flex-direction:row;gap:5px;justify-content:space-between;align-items:stretch">
                    <div>
                        <a href="student_registration.php" style="height:100%">
                            <button id="add-new-student"><span class="material-symbols-sharp">add</span>Student</button>
                        </a>
                    </div>
                    <button class="download-csv" id="create-clearance" data-modal-target="#create-clearance-modal">Create Clearance</button>


                    <button id="register-csv-file-btn"><span class="material-symbols-sharp">upload_file</span>Register Via .csv file<span class="material-symbols-sharp">arrow_forward_ios</span></button>
                    <div>
                        <div class="upload-student-csv-container">
                            <form action="student_upload_csv.php" method="post" enctype="multipart/form-data" name="upload_csv">
                                <div class="form-input-file-csv-container">
                                    <label for="input-file">Choose CSV File</label>
                                    <input type="file" name="file" accept=".csv" id="input-file">
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

            <div class="update-container">
                <div class="table-container">
                    <table id="example" class="display student-list-table">
                        <thead>
                            <div class="bulk-options-div">
                                <button id="bulk-options">
                                    <h3>Bulk Actions</h3>
                                </button>
                            </div>
                            <tr>
                                <th><input type="checkbox" id="checkAll" /></th>
                                <th>Student ID</th>
                                <th>First Name</th>
                                <!-- <th>Middle Name</th> -->
                                <th>Last Name</th>
                                <th>Year Level</th>
                                <th>Department</th>
                                <th>Course</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th><input type="checkbox" id="checkAll" /></th>
                                <th>Student ID</th>
                                <th>First Name</th>
                                <!-- <th>Middle Name</th> -->
                                <th>Last Name</th>
                                <th>Year Level</th>
                                <th>Department</th>
                                <th>Course</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="bulk-actions-container">
                    <h3 style="text-align: center;">Bulk Update</h3>
                    <button id="close-bulk-options-button">
                        <span class="material-symbols-sharp">close</span>
                    </button>
                    <div class="bulk-action">
                        <button type="button" id="active">Set as Active</button>
                    </div>
                    <div class="bulk-action">
                        <button type="button" id="inactive" onclick="">Set as Inactive</button>
                    </div>
                    <div class="bulk-action">
                        <button type="button" id="1st_year">Set as 1st Year</button>
                    </div>
                    <div class="bulk-action">
                        <button type="button" id="2nd_year">Set as 2nd Year</button>
                    </div>
                    <div class="bulk-action">
                        <button type="button" id="3rd_year">Set as 3rd Year</button>
                    </div>
                    <div class="bulk-action">
                        <button type="button" id="4th_year">Set as 4th Year</button>
                    </div>
                </div>

            </div>

        </div>


    </main>
    <!-- ================ END OF MAIN =================== -->

</div>

<div class="loads">
    <h2>Please wait...</h2>
</div>

<div class="modal" id="create-clearance-modal" style="width: 350px;">
    <div class="modal-header">
        <div class="title">Create New Clearance</div>
        <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="requirements-modal-body">
        <div class="input">
            <label for="">Clearance Progress:</label>
            <select name="clearance_progress_id" id="clearance_progress_id">
                <option default>Select School Year And Sem</option>
                <?php $school_year = $db->result('clearance_progress_view', 'status = "Active"'); ?>
                <?php foreach ($school_year as $year) : ?>
                    <option value="<?= $year->clearance_progress_id; ?>"><?= $year->school_year_and_sem . " " . $year->sem_name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="input">
            <label for="">Clearance Type:</label>
            <select name="clearance_type_id" id="clearance_type_id">
                <option default>Select Clearance Type</option>
                <?php $clearances = $db->result('clearance_type'); ?>
                <?php foreach ($clearances as $clearance) : ?>
                    <option value="<?= $clearance->clearance_type_id; ?>"><?= $clearance->clearance_type_name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button class="create-clearance" id="bulk-clearance">Create Clearance</button>
    </div>
</div>
<div id="overlay"></div>

<script src="../assets/js/cdn.js"></script>

<!-- <script>
        //jquery onclick event for update button
        $(document).on("click", '#active', function(){
            let rows_selected = table.column(0).checkboxes.selected();
            let list_student_id = [];
            let list_inputs = $('.row')
            list_inputs.map((index,elem,arr) => {
                let is_check = $(elem).prop("checked")
                if(is_check == true ){
                    list_student_id.push($(elem).attr("student_id"))
                }
            });
            console.log(list_student_id);
            $.ajax({
                url: "student_update_status.php",
                method: "POST",
                data: {
                    list_student_id:list_student_id,
                    status:'Active'
                },
                success: (response) =>{
                    $("#checkAll").prop("checked",false);
                    $('#example').DataTable().ajax.reload();
                }
            })
        });
    </script>

        <script>
            //jquery onclick event for update button
            $(document).on("click", '#inactive', function(){
                let rows_selected = table.column(0).checkboxes.selected();
                let list_student_id = [];
                let list_inputs = $('.row')
                list_inputs.map((index,elem,arr) => {
                    let is_check = $(elem).prop("checked")
                    if(is_check == true ){
                        list_student_id.push($(elem).attr("student_id"))
                    }
                });
                console.log(list_student_id);
                $.ajax({
                    url: "student_inactive_status.php",
                    method: "POST",
                    data: {
                        list_student_id:list_student_id,
                        status:'Inactive'
                    },
                    success: (response) =>{
                        $("#checkAll").prop("checked",false);
                        $('#example').DataTable().ajax.reload();
                        
                    }
                })
            });

        </script>
        

<script>
        //jquery onclick event for update button
        $(document).on("click", '#1st_year', function(){
            let rows_selected = table.column(0).checkboxes.selected();
            let list_student_id = [];
            let list_inputs = $('.row')
            list_inputs.map((index,elem,arr) => {
                let is_check = $(elem).prop("checked")
                if(is_check == true ){
                    list_student_id.push($(elem).attr("student_id"))
                }
            });
            console.log(list_student_id);
            $.ajax({
                url: "student_1st.php",
                method: "POST",
                data: {
                    list_student_id:list_student_id,
                    student_year:'1st Year'
                },
                success: (response) =>{
                    $("#checkAll").prop("checked",false);
                    $('#example').DataTable().ajax.reload();
                }
            })
        });
    </script> -->

<!-- <script>
        //jquery onclick event for update button
        $(document).on("click", '#2nd_year', function(){
            let rows_selected = table.column(0).checkboxes.selected();
            let list_student_id = [];
            let list_inputs = $('.row')
            list_inputs.map((index,elem,arr) => {
                let is_check = $(elem).prop("checked")
                if(is_check == true ){
                    list_student_id.push($(elem).attr("student_id"))
                }
            });
            console.log(list_student_id);
            $.ajax({
                url: "student_2nd.php",
                method: "POST",
                data: {
                    list_student_id:list_student_id,
                    student_year:'2nd Year'
                },
                success: (response) =>{
                    $("#checkAll").prop("checked",false);
                    $('#example').DataTable().ajax.reload();
                }
            })
        });
    </script> -->

<!-- <script>
        //jquery onclick event for update button
        $(document).on("click", '#3rd_year', function(){
            let rows_selected = table.column(0).checkboxes.selected();
            let list_student_id = [];
            let list_inputs = $('.row')
            list_inputs.map((index,elem,arr) => {
                let is_check = $(elem).prop("checked")
                if(is_check == true ){
                    list_student_id.push($(elem).attr("student_id"))
                }
            });
            console.log(list_student_id);
            $.ajax({
                url: "student_2nd.php",
                method: "POST",
                data: {
                    list_student_id:list_student_id,
                    student_year:'3rd Year'
                },
                success: (response) =>{
                    $("#checkAll").prop("checked",false);
                    $('#example').DataTable().ajax.reload();
                }
            })
        });
    </script> -->

<script>
    //jquery onclick event for update button
    // $(document).on("click", '#4th_year', function(){
    //     let rows_selected = table.column(0).checkboxes.selected();

    //     console.log(rows_selected);
    //     return
    //     let list_student_id = [];
    //     let list_inputs = $('.row')
    //     list_inputs.map((index,elem,arr) => {
    //         let is_check = $(elem).prop("checked")
    //         if(is_check == true ){
    //             list_student_id.push($(elem).attr("student_id"))
    //         }
    //     });
    //     console.log(list_student_id);
    //     $.ajax({
    //         url: "student_2nd.php",
    //         method: "POST",
    //         data: {
    //             list_student_id:list_student_id,
    //             student_year:'4th Year'
    //         },
    //         success: (response) =>{
    //             $("#checkAll").prop("checked",false);
    //             $('#example').DataTable().ajax.reload();
    //         }
    //     })
    // });
</script>

<script>
    $(document).ready(function() {
        $("#register-csv-file-btn").click(function() {
            if ($("#register-csv-file-btn span:nth-child(2)").html() == "arrow_forward_ios") {
                $("#register-csv-file-btn span:nth-child(2)").html("arrow_back_ios")
            } else {
                $("#register-csv-file-btn span:nth-child(2)").html("arrow_forward_ios")
            }

            $(".upload-student-csv-container").slideToggle(200)
        })
    })
</script>

<!-- <script type="text/javascript">
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
        </script> -->

<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            "columnDefs": [
                // { "bSortable": false, "aTargets": [ 0 ] },
                {
                    'targets': 0,
                    'checkboxes': {
                        'selectRow': true
                    }
                },
            ],
            select: {
                'style': 'multi'
            },
            'order': [
                [1, 'asc']
            ],
            lengthMenu: [50, 100, 200, 500, 1000],
            processing: true,
            serverSide: true,
            ajax: 'server_processing.php',
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

        // $(document).on("click", '#bulk-clearance', function() {
        //     let clearance_progress_id = $("#clearance_progress_id").val();
        //     let clearance_type_id = $("#clearance_type_id").val();
        //     let rows_selected = table.column(0).checkboxes.selected();

        //     // console.log(rows_selected);
        //     // return

        //     let list_student_id = [];
        //     // let list_inputs = $('.row')

        //     rows_selected.map((elem) => {
        //         // console.log($(elem).children("input").prop("student_id"));
        //         list_student_id.push($(elem).children("input").attr("student_id"))

        //     })

        //     // console.log(list_student_id);
        //     // return
        //     $.ajax({
        //         url: "clearance_bulk.php",
        //         method: "POST",
        //         data: {
        //             list_student_id: list_student_id,
        //             clearance_progress_id: clearance_progress_id,
        //             clearance_type_id: clearance_type_id,
        //             clearance_status: '1'
        //         },
        //         success: (response) => {
        //             if (response === "existed") {
        //                 alert(response)
        //                 // Swal.fire(
        //                 //     'Error',
        //                 //     'Clearance already existed.',
        //                 //     'error'
        //                 // ).then((result) => {
        //                 //     if (result.isConfirmed) {
        //                 //         location.reload(); // Reload the page
        //                 //     }
        //                 // });
        //             } else {
        //                 // $("#checkAll").prop("checked", false);
        //                 // $('#example').DataTable().ajax.reload();
        //                 // table.columns().checkboxes.deselect(true);
        //                 location.reload();
        //             }
        //         }
        //     });


        //     // location.reload();
        // });


        $(document).on("click", '#bulk-clearance', function() {
            let loads = document.querySelector(".loads")
            loads.classList.add("loaders");


            let clearance_progress_id = $("#clearance_progress_id").val();
            let clearance_type_id = $("#clearance_type_id").val();
            let rows_selected = table.column(0).checkboxes.selected();
            let list_student_id = [];

            rows_selected.map((elem) => {
                list_student_id.push($(elem).children("input").attr("student_id"));
            });


            let successfulResponses = 0;
            let totalRequests = Math.ceil(list_student_id.length / 500); // calculate total requests needed
            let counter = 0;

            // Chunk the array into 500
            for (let i = 0; i < list_student_id.length; i += 500) {
                let chunk = list_student_id.slice(i, i + 500);
                $.ajax({
                    url: "clearance_bulk.php",
                    method: "POST",
                    data: {
                        list_student_id: chunk,
                        clearance_progress_id: clearance_progress_id,
                        clearance_type_id: clearance_type_id,
                        clearance_status: '1'
                    },
                    success: (response) => {
                        successfulResponses++; // increment the successful responses counter
                        // check if all responses have been received
                        if (successfulResponses === totalRequests) {
                            loads.classList.remove("loaders")

                            // display SweetAlert once all responses have been received
                            Swal.fire(
                                'Successful',
                                `Successfully created clearance`,
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload(); // Reload the page
                                }
                            });
                        }
                    }
                });
            }
        });





        $(document).on("click", '#active', function() {
            let rows_selected = table.column(0).checkboxes.selected();

            // console.log(rows_selected);
            // return

            let list_student_id = [];
            // let list_inputs = $('.row')

            rows_selected.map((elem) => {
                // console.log($(elem).children("input").prop("student_id"));
                list_student_id.push($(elem).children("input").attr("student_id"))

            })

            // console.log(list_student_id);
            // return
            $.ajax({
                url: "student_update_status.php",
                method: "POST",
                data: {
                    list_student_id: list_student_id,
                    status: 'Active'
                },
                success: (response) => {
                    $("#checkAll").prop("checked", false);
                    $('#example').DataTable().ajax.reload();
                    table.columns().checkboxes.deselect(true);
                }
            })
        });
        $(document).on("click", '#inactive', function() {
            let rows_selected = table.column(0).checkboxes.selected();

            // console.log(rows_selected);
            // return

            let list_student_id = [];
            let list_inputs = $('.row')

            rows_selected.map((elem) => {
                // console.log($(elem).children("input").prop("student_id"));
                list_student_id.push($(elem).children("input").attr("student_id"))

            })

            // console.log(list_student_id);
            // return
            $.ajax({
                url: "student_inactive_status.php",
                method: "POST",
                data: {
                    list_student_id: list_student_id,
                    status: 'Inactive'
                },
                success: (response) => {
                    $("#checkAll").prop("checked", false);
                    $('#example').DataTable().ajax.reload();
                    table.columns().checkboxes.deselect(true);
                }
            })
        });
        $(document).on("click", '#1st_year', function() {
            let rows_selected = table.column(0).checkboxes.selected();

            // console.log(rows_selected);
            // return

            let list_student_id = [];
            let list_inputs = $('.row')

            rows_selected.map((elem) => {
                // console.log($(elem).children("input").prop("student_id"));
                list_student_id.push($(elem).children("input").attr("student_id"))

            })

            // console.log(list_student_id);
            // return
            $.ajax({
                url: "student_2nd.php",
                method: "POST",
                data: {
                    list_student_id: list_student_id,
                    student_year: '1st Year'
                },
                success: (response) => {
                    $("#checkAll").prop("checked", false);
                    $('#example').DataTable().ajax.reload();
                    table.columns().checkboxes.deselect(true);
                }
            })
        });
        $(document).on("click", '#2nd_year', function() {
            let rows_selected = table.column(0).checkboxes.selected();

            // console.log(rows_selected);
            // return

            let list_student_id = [];
            let list_inputs = $('.row')

            rows_selected.map((elem) => {
                // console.log($(elem).children("input").prop("student_id"));
                list_student_id.push($(elem).children("input").attr("student_id"))

            })

            // console.log(list_student_id);
            // return
            $.ajax({
                url: "student_2nd.php",
                method: "POST",
                data: {
                    list_student_id: list_student_id,
                    student_year: '2nd Year'
                },
                success: (response) => {
                    $("#checkAll").prop("checked", false);
                    $('#example').DataTable().ajax.reload();
                    table.columns().checkboxes.deselect(true);
                }
            })
        });
        $(document).on("click", '#3rd_year', function() {
            let rows_selected = table.column(0).checkboxes.selected();

            // console.log(rows_selected);
            // return

            let list_student_id = [];
            let list_inputs = $('.row')

            rows_selected.map((elem) => {
                // console.log($(elem).children("input").prop("student_id"));
                list_student_id.push($(elem).children("input").attr("student_id"))

            })

            // console.log(list_student_id);
            // return
            $.ajax({
                url: "student_2nd.php",
                method: "POST",
                data: {
                    list_student_id: list_student_id,
                    student_year: '3rd Year'
                },
                success: (response) => {
                    $("#checkAll").prop("checked", false);
                    $('#example').DataTable().ajax.reload();
                    table.columns().checkboxes.deselect(true);
                }
            })
        });
        $(document).on("click", '#4th_year', function() {
            let rows_selected = table.column(0).checkboxes.selected();

            // console.log(rows_selected);
            // return

            let list_student_id = [];
            let list_inputs = $('.row')

            rows_selected.map((elem) => {
                // console.log($(elem).children("input").prop("student_id"));
                list_student_id.push($(elem).children("input").attr("student_id"))

            })

            // console.log(list_student_id);
            // return
            $.ajax({
                url: "student_2nd.php",
                method: "POST",
                data: {
                    list_student_id: list_student_id,
                    student_year: '4th Year'
                },
                success: (response) => {
                    $("#checkAll").prop("checked", false);
                    $('#example').DataTable().ajax.reload();
                    table.columns().checkboxes.deselect(true);
                }
            })
        });
    });
</script>

<!-- <script src="../assets/js/student-info.js"></script> -->

<!-- <script defer src="../assets/js//modal.js"></script> -->
<script src="../assets/js/index.js"></script>
<script defer src="../assets/js/active.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- <script src="../assets/js/update.js"></script> -->


<script>
    try {
        const openModalButtons = document.querySelectorAll('[data-modal-target]')
        const closeModalButtons = document.querySelectorAll('[data-close-button]')
        const overlay = document.getElementById('overlay')

        openModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                const modal = document.querySelector(button.dataset.modalTarget)
                openModal(modal)
                console.log(this);
            })
        })

        overlay.addEventListener('click', () => {
            const modals = document.querySelectorAll('.modal.active')
            modals.forEach(modal => {
                closeModal(modal)
            })
            console.log("overlay clicked");
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






    // delete datatable
    // drawCallback: function () {
    //             $('.delete').on('click',function(){
    //                 let student_id = $(this).attr('data-id');
    //                 Swal.fire({
    //                     title: 'Are you sure?',
    //                     text: "You won't be able to revert this!",
    //                     icon: 'warning',
    //                     showCancelButton: true,
    //                     confirmButtonColor: '#3085d6',
    //                     cancelButtonColor: '#d33',
    //                     confirmButtonText: 'Yes, delete it!'
    //                 }).then((result) => {
    //                     if (result.isConfirmed) {
    //                         $.ajax({
    //                             type: 'post',
    //                             url: 'deleteinfo.php',
    //                             data: {student_id:student_id},
    //                             success: function(response){
    //                                 if(response === "Deleted"){
    //                                     Swal.fire(
    //                                         'Deleted!',
    //                                         'Your file has been deleted.',
    //                                         'success'
    //                                     )
    //                                 }else{
    //                                     Swal.fire(
    //                                         'Error',
    //                                         'Error deleting data.',
    //                                         'error'
    //                                     )
    //                                 }

    //                                 setTimeout(() => { 
    //                                     location.reload(true);
    //                                 }, 1000);
    //                             } 
    //                         })
    //                     }
    //                 })
    //             })
    //         },
</script>
</body>

</html>