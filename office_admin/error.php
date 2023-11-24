<?php
include_once '../connection.php';
include_once 'office_header.php';


if (!isset($_GET['requirement_details'])) {
    echo "<h1>There's an error while viewing details.</h1>";
} else {
    $requirement_details = $_GET['requirement_details'];
    $clearance_progress_id = $_GET['clearance_progress_id'];

    $_SESSION['requirement_details'] = $requirement_details;
    $_SESSION['clearance_progress_id'] = $clearance_progress_id;
    // $sql = "SELECT * FROM requirement_view WHERE requirement_details ='".$requirement_details."'";
    // $required_students = $conn->query($sql) or die($conn->error);
    // $row = $required_students->fetch_assoc();

    $required_students = $db->query("SELECT * FROM requirement_view WHERE requirement_details = $requirement_details");
}


?>
<div class="office-container">
    <?php
    include_once 'office_navtop.php'
    ?>

    <!-- ================ MAIN =================== -->
    <div class="main-requirements-container">
        <div class="first-main-content-container">
        <div class="table-container" style="position:relative">
                <p>Selected Clearance: <span id="selected-clearance-counter">0</span> </p>
                <br>
                <table id="required-students" class="display clearance-list dt-checkboxes-select-all sorting_disabled" style="width:100%; ">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll" /></th>
                            <th>Student ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>


<script src="../assets/js/cdn.js"></script>
<script src="../assets/js/office_admin_index.js"></script>

<script>
    
    // $(function() {
    //     loadClearance();

    // });

    // function loadClearance() {
    //     $.ajax({
    //         url: 'get_all_clearance.php',
    //         type: 'POST',
    //         success: function(response) {
    //             let res = $.parseJSON(response);
    //             console.log(res);
    //         }
    //     });
    // }

    $(document).ready(function() {
        var table = $('#required-students').DataTable({
            select: {
                'style': 'multi'
            },
            'order': [
                [4, 'asc']
            ],
            // order: [[3, 'desc']],
            processing: true,
            serverSide: true,
            ajax: 'server_required_students.php',
            columnDefs: [
                {
                    target: 4,
                    render: function(data, type, row) {
                        return (data == 1 ? 'Cleared' : 'Not Cleared');
                    },
                }
            ] 
        });


        $(document).on('change', '#example thead th:nth-child(1) input[type="checkbox"]', function() {
            updateCounter();
        });

        $(document).on('change', '#example tbody td:nth-child(1) input[type="checkbox"]', function() {
            updateCounter();
        });

        function updateCounter() {
            var selectedCount = table.column(0).checkboxes.selected().length;
            $('#selected-clearance-counter').text(selectedCount);
        }


        $(document).on("click", '#bulk-requirement', function() {
            let loads = document.querySelector(".loads")

            loads.classList.add("loader");

            let clearance_progress_id = $("#clearance_progress_id").val();
            let requirement_details = $("#requirement_details").val();
            let requirement_details2 = $("#requirement_details2").val();
            let requirement_details3 = $("#requirement_details3").val();
            let rows_selected = table.column(0).checkboxes.selected();

            // console.log(rows_selected);

            // console.log(rows_selected);
            // return

            let list_clearance_id = [];
            // let list_inputs = $('.row')

            rows_selected.map((elem) => {
                // console.log($(elem).children("input").prop("student_id"));
                list_clearance_id.push($(elem).children("input").attr("clearance_id"))

            })

            // console.log(list_student_id);
            // return

            let successfulResponses = 0;
            let totalRequests = Math.ceil(list_clearance_id.length / 500); // calculate total requests needed
            let counter = 0;
            for (let i = 0; i < list_clearance_id.length; i += 500) {
                let chunk = list_clearance_id.slice(i, i + 500);
                $.ajax({
                    url: "requirement_bulk.php",
                    method: "POST",
                    data: {
                        list_clearance_id: chunk,
                        clearance_progress_id: clearance_progress_id,
                        requirement_details: requirement_details,
                        requirement_details2: requirement_details2,
                        requirement_details3: requirement_details3,
                        clearance_status: '0'
                    },
                    success: (response) => {
                        console.log(response);
                        successfulResponses++; // increment the successful responses counter
                        if (response) {

                            let index = response.indexOf("Message");
                            if (index !== -1) {
                                let cutStr = response.substring(0, index);
                                cutStr = Number(cutStr);
                                counter += cutStr;
                            }

                        }
                        // check if all responses have been received
                        if (successfulResponses === totalRequests) {
                            loads.classList.remove("loader")

                            // display SweetAlert once all responses have been received
                            Swal.fire(
                                'Successful',
                                `Successfully added ${counter} requirements`,
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

        $(document).on('click', '#checkAll', function() {
            let rows_selected = table.column(0).checkboxes.selected();
            console.log(rows_selected);
            rows_selected.map(function(elem) {
                console.log(elem);
            });
        })
    });

    // $(document).ready(function() {


    //     let table = $('#required-students').DataTable({
    //         select: {
    //             'style': 'multi'
    //         },
    //         'order': [
    //             [4, 'asc']
    //         ],
    //         // order: [[3, 'desc']],
    //         lengthMenu: [50, 100, 200, 500, 1000],
    //         processing: true,
    //         serverSide: true,
    //         ajax: 'server_required_students.php',
    //         columnDefs: [
    //             {
    //                 target: 4,
    //                 render: function(data, type, row) {
    //                     return (data == 1 ? 'Cleared' : 'Not Cleared');
    //                 },
    //             }
    //         ]
    //     });
    //     $(document).on('click', '#checkAll', function() {
    //         let rows_selected = table.column(0).checkboxes.selected();
    //         console.log(rows_selected);
    //         rows_selected.map(function(elem) {
    //             console.log(elem);
    //         });
    //     });
    // });
    

    $(".remove-student").click(function(){
            var student_id = $(this).val();
            console.log(student_id);
            $.ajax({
                url: "remove_student.php",
                type: "POST",
                data: {
                    student_id: student_id,
                    requirement_details: <?= $requirement_details; ?>
                },
                success: function(data){
                    alert(data);
                    location.reload();
                }
            });
        });
</script>

</body>
</html>