<?php
include_once 'office_header.php';
include_once '../connection.php';
if (!isset($_GET['requirement_details'])) {
    echo "<h1>There's an error while viewing details.</h1>";
} else {
    $requirement_details = $_GET['requirement_details'];
    $clearance_progress_id = $_GET['clearance_progress_id'];


    $_SESSION['requirement_details'] = $requirement_details;
    $_SESSION['clearance_progress_id'] = $clearance_progress_id;
        
    $is_department = $_SESSION['is_department'];


    $office_id = $_SESSION['office_id'];
    $query = "SELECT * FROM office WHERE office_id = '$office_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

            
    $getClearanceProgressStatusQuery = "SELECT * FROM clearance_progress WHERE clearance_progress_id = $clearance_progress_id";
    $runClearanceProgressStatusQuery  = mysqli_query($conn, $getClearanceProgressStatusQuery);
    $rowClearanceProgressStatus = mysqli_fetch_array($runClearanceProgressStatusQuery);
    
    $status = $rowClearanceProgressStatus['status'];


}





// var_dump($row);

$is_department = $row['is_department'];



?>
<div class="office-container">

    <?php
    include_once 'office_navtop.php'
    ?>

    <!-- ================ MAIN =================== -->
    <div class="office-main-container">
        <div class="first-div-container">
            <div>
                <p style="font-size: 2rem;">Student's who doesn't receive <b><?= $requirement_details; ?></b> requirement yet</p>
            </div>
        </div>
        <?php
        if ($_SESSION['office_id'] == $office_id && $is_department == 1) {
            $query = "SELECT COUNT(*) FROM view_clearance WHERE student_id NOT IN (SELECT student_id FROM requirement WHERE requirement_details = '$requirement_details') AND office_id = $office_id AND clearance_progress_id = $clearance_progress_id";
            $result = mysqli_query($conn, $query);

            $total_users = mysqli_fetch_array($result);


            mysqli_close($conn);
        } else {
            $query = "SELECT COUNT(*) FROM view_clearance WHERE student_id NOT IN (SELECT student_id FROM requirement WHERE requirement_details = '$requirement_details') AND clearance_progress_id = $clearance_progress_id";
            $result = mysqli_query($conn, $query);

            $total_users = mysqli_fetch_array($result);
        }

        ?>

        <div class="student-panel-insights-container">
            <div class="student-insight-container">
                <div class="upper-insight">
                    <div class="left-logo-insight">
                        <span class="material-symbols-sharp">groups_2 </span>
                    </div>
                    <div class="right-insights">
                        <h3 class="success">Number of students clearance that assigned for you who doesn't receive <?= $requirement_details; ?> yet.</h3>
                        <h2><?= $total_users[0]; ?></h2>
                    </div>
                </div>
                <div class="lower-insight">
                    <small>Ajinomoto of sardines</small>
                </div>
            </div>
        </div>



        <div class="recent-orders-student">

            <div class="clearance-table-title">
                <div class="h2-container">
                    <h2>Student Clearance list</h2>
                </div>

                <div>

                    <?php if($status == 'Active'): ?>
                    <button class="create-requirements" style="background-color: orange;" id="bulk_requirements">+ Send <?= $requirement_details; ?> Requirements</button>
                    <?php endif; ?>
                </div>
            </div>

            <div class="table-container" style="position:relative">
                <p>Selected Clearance: <span id="selected-clearance-counter">0</span> </p>
                <br>
                <table id="example" class="display clearance-list" style="width:100%; ">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll" /></th>
                            <th>Clearance ID</th>
                            <th>School Year and Sem Id</th>
                            <th>Clearance ID</th>
                            <th>Student ID</th>
                            <th>Student First Name</th>
                            <th>Student Last Name</th>
                            <th>Year Level</th>
                            <th>Office Name</th>
                            <th>Course</th>
                            <th>School Year</th>
                            <th>Semester</th>
                            <th>Clearance Type</th>
                            <th>Clearance Status</th>
                            <th>Semester Id</th>
                            <th>Student Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th><input type="checkbox" id="checkAll" /></th>
                            <th>Clearance ID</th>
                            <th>School Year and Sem Id</th>
                            <th>Clearance ID</th>
                            <th>Student ID</th>
                            <th>Student First Name</th>
                            <th>Student Last Name</th>
                            <th>Year Level</th>
                            <th>Office Name</th>
                            <th>Course</th>
                            <th>School Year</th>
                            <th>Semester</th>
                            <th>Clearance Type</th>
                            <th>Clearance Status</th>
                            <th>Semester Id</th>
                            <th>Student Type</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
</div>









<script src="../assets/js/cdn.js"></script>


<script>



    $(document).ready(function() {
        var table = $('#example').DataTable({
            select: {
                'style': 'multi'
            },
            'order': [
                [4, 'asc']
            ],
            // order: [[3, 'desc']],
            lengthMenu: [50, 100, 200, 500, 1000],
            processing: true,
            serverSide: true,
            ajax: 'serverGetNoRequirements.php',
            columnDefs: [{
                    'targets': 0,
                    'checkboxes': {
                        'selectRow': true
                    }
                }, {
                    target: 1,
                    visible: false,
                    searchable: false,
                }, {
                    target: 3,
                    visible: false,
                    searchable: false,
                },
                {
                    target: 2,
                    visible: false,
                },
                {
                    target: 14,
                    visible: false,
                },
                {
                    target: 16,
                    visible: false,
                },
                {
                    target: 13,
                    render: function(data, type, row) {
                        let color = '';
                        if(data == 1){
                            color = 'green';
                        } else if(data == 0){
                            color = 'red';
                        }
                        return '<span style="color: '+color+';">'+(data == 1 ? 'Cleared' : 'Not Cleared')+'</span>';
                    },
                }
            ],

            initComplete: function() {
                this.api()
                    .columns()
                    .every(function() {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column
                                    .search(val, true, false)
                                    .draw();
                            });

                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function(d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                            });
                    });
            },
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


        $(document).on("click", '#bulk_requirements', function() {

            let clearance_progress_id = <?= $clearance_progress_id; ?>;
            let requirement_details = '<?= $requirement_details; ?>';
            let rows_selected = table.column(0).checkboxes.selected();


            let list_clearance_id = [];
            // let list_inputs = $('.row')

            rows_selected.map((elem) => {
                // console.log($(elem).children("input").prop("student_id"));
                list_clearance_id.push($(elem).children("input").attr("clearance_id"))
            })

            $.ajax({
                url: 'send_no_requirement_bulk.php',
                type: 'POST',
                data: {
                    list_clearance_id: list_clearance_id,
                    clearance_progress_id: clearance_progress_id,
                    requirement_details: requirement_details,
                    clearance_status: 0,
                },
                success: function(data) {
                    alert(data);
                    location.reload();
                }
            });
        });
        
        $(document).on('click', '#checkAll', function() {
            ;
            let rows_selected = table.column(0).checkboxes.selected();
            rows_selected.map(function(elem) {
                console.log(elem);
            });
        })
    });
</script>

<script src="../assets/js/office_admin_index.js"></script>

</body>

</html>