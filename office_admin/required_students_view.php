<?php
include_once '../connection.php';
include_once 'office_header.php';


if (!isset($_GET['requirement_details'])) {
    echo "<h1>There's an error while viewing details.</h1>";
} else {
    $requirement_details = $_GET['requirement_details'];
    $clearance_progress_id = $_GET['clearance_progress_id'];
    $clearance_type_id = $_GET['clearance_type_id'];

    $_SESSION['requirement_details'] = $requirement_details;
    $_SESSION['clearance_progress_id'] = $clearance_progress_id;



    $retrieveClearanceProgressStatus = "SELECT * FROM clearance_progress WHERE clearance_progress_id = $clearance_progress_id";
    $runRetrieveClearanceProgressStatus = mysqli_query($conn, $retrieveClearanceProgressStatus);
    $rowRetrieveClearanceProgressStatus = mysqli_fetch_assoc($runRetrieveClearanceProgressStatus);
    
    $status = $rowRetrieveClearanceProgressStatus['status'];

    $retrieveSigningOfficeId = "SELECT * FROM signing_office WHERE clearance_type_id = $clearance_type_id AND clearance_progress_id = $clearance_progress_id";
    $runRetrieveSigningOfficeId = mysqli_query($conn, $retrieveSigningOfficeId);
    $rowRetrieveSigningOfficeId = mysqli_fetch_assoc($runRetrieveSigningOfficeId);

    $signing_office_id = $rowRetrieveSigningOfficeId['signing_office_id'];
}


?>
<div class="office-container">

    <?php
    include_once 'office_navtop.php'
    ?>

    <!-- ================ MAIN =================== -->
    <div class="office-main-container">
        <div class="first-div-container">
            <div>
                <p style="font-size: 2.5rem;">Students who received <b><?= $requirement_details; ?></b> requirement.</p>
            </div>
        </div>

        <div class="recent-orders-student">

            <div class="clearance-table-title">
                <div class="h2-container">
                    <h2>Student List</h2>
                </div>
                <div>
                    <?php if($status === "Active") : ?>
                        <button class="create-clearance" style="background-color: red;" id="remove-student">- Remove Student</button>
                    <?php endif; ?>
                    <?php if($status == 'Inactive'): ?>
                        <button class="create-clearance"  id="approve-student">+ Approve</button>
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
                            <th>Student ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>School Year</th>
                            <th>Semester</th>
                            <th>Clearance Type</th>
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
            ajax: 'server_required_students.php',
            columnDefs: [{
                    'targets': 0,
                    'checkboxes': {
                        'selectRow': true
                    }
                }, 
                {
                    target: 8,
                    visible: false,
                },
                {
                    target: 7,
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

        $(document).on("click","#approve-student", function(){
            let requirement_details = <?= $requirement_details; ?>;
            let clearance_progress_id = <?= $clearance_progress_id; ?>;
            let rows_selected = table.column(0).checkboxes.selected();

            let list_student_id = [];
            // let list_inputs = $('.row')

            rows_selected.map((elem) => {
                list_student_id.push($(elem).children("input").attr("student_id"));
            });

            $.ajax({
                url: "bulk_approve.php",
                type: "POST",
                data: {
                    list_student_id: list_student_id,
                    requirement_details: requirement_details,
                    clearance_progress_id: clearance_progress_id
                },
                success: function(data){
                    alert(data);
                    location.reload();
                }
            });

        });

        $(document).on('click', '#checkAll', function() {
            let rows_selected = table.column(0).checkboxes.selected();
            console.log(rows_selected);
            rows_selected.map(function(elem) {
                console.log(elem);
            });
        })

        $(document).on("click","#remove-student", function(){
            let requirement_details = <?= $requirement_details; ?>;
            let clearance_progress_id = <?= $clearance_progress_id; ?>;
            let rows_selected = table.column(0).checkboxes.selected();

            let list_student_id = [];

            rows_selected.map((elem) => {
                list_student_id.push($(elem).children("input").attr("student_id"));
            });

            $.ajax({
                url: "bulk_remove_student.php",
                type: "POST",
                data: {
                    list_student_id: list_student_id,
                    requirement_details: requirement_details,
                    clearance_progress_id: clearance_progress_id
                },
                success: function(data){
                    alert(data);
                    location.reload();
                }
            });

        });
    });
</script>



<script src="../assets/js/office_admin_index.js"></script>

</body>

</html>