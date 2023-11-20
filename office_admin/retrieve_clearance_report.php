<?php

include_once 'office_header.php';

include_once '../connection.php';
$is_department = $_SESSION['is_department'];
$office_id = $_SESSION['office_id'];
$where = "";


    if (isset($_POST['submit'])) {
        $clearance_progress_id = $_POST['clearance_progress_id'];
        $course_id = $_POST['course_id'];
        $year_level = $_POST['student_year'];
        // $office_id = $_POST['office_id'];

        // $sql = "SELECT * FROM course WHERE course_id = $course_id";

        // $result2 = mysqli_query($conn, $sql);
        // $row3 = mysqli_fetch_assoc($result2);

        // // $office_ids = $row3['office_id'];


    // $query = "SELECT * FROM view_clearance WHERE clearance_progress_id = $clearance_progress_id";
    // $result = mysqli_query($conn, $query);
    // $row = mysqli_fetch_assoc($result);

        // if($_SESSION['is_department'] == 1) {
        //     $query = "SELECT * FROM office WHERE is_department = 1 AND office_id = $office_id";
        // } else {
        //     $query = "SELECT * FROM office WHERE is_department = 1";
        // }

        $q = "SELECT * FROM view_clearance WHERE clearance_progress_id = $clearance_progress_id";

        if($year_level != "All"){
            $q = $q. " and student_year = '$year_level'";
        }

        if($course_id != "All"){
            $q = $q. " and course_id = $course_id";
        }

        $result4 = mysqli_query($conn, $q);

        $query2 = "SELECT * FROM clearance_progress_view WHERE clearance_progress_id = $clearance_progress_id";
        $result2 = mysqli_query($conn, $query2);
        $row2 = mysqli_fetch_assoc($result2);

        $school_year_and_sem = $row2['school_year_and_sem'];  
        $sem_name = $row2['sem_name'];

        // $result = mysqli_query($conn, $query);

        // $departments = array();
        
        // while($row = mysqli_fetch_assoc($result)) {
        //     array_push($departments,$row);
        // }
        
        // print_r($departments);
        // die();

        $num_of_cleared = 0;
        $number_not_cleared = 0;
    }

?>

    <div class="reports-page-body">
        <div class="reports-main-container">
            <h1 style="text-align: center;">CLEARANCE REPORTS</h1>
            <h1 style="text-align: center;margin-top:-20px"><?= $school_year_and_sem.' '.$sem_name; ?></h1>
            <button id="print-reports-button">Print Reports</button>
            <div class="canvas-container">
                <canvas id="myChart"></canvas>
            </div>
            <div class="reports-tables-container">


                    <div class="report-table-container">
                        <h3 class="text-muted">List of students of </h3>
                        <!-- <h3><?= $department['office_name'] ?></h3> -->
                        <table style="width: 100%;">
                            <thead>
                                <th>Student Name</th>
                                <th>Course</th>
                                <th>Year Level</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                
                                <?php while($row = mysqli_fetch_assoc($result4)): 
                                    if($row['clearance_status'] == 1 ) {$num_of_cleared++;}
                                    if($row['clearance_status'] == 0) {$number_not_cleared++;}
                                ?>
                                    <tr>
                                        <td><?= $row['student_first_name'].' '.$row['student_last_name']; ?></td>
                                        <td><?= $row['course_name']; ?></td>
                                        <td><?= $row['student_year']; ?></td>
                                        <td class="overall-clearance-status"><?=  $row['clearance_status'] == 1  ? "Cleared": 'Not Cleared'; ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
            </div>
            
        </div>
    </div>

    
    <script src="../assets/js/office_admin_index.js"></script>

    <script>
        document.querySelector("#print-reports-button").addEventListener("click", function() {
            window.print()
        })
    </script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Approved', 'Not Cleared'],
                datasets: [{
                    label: 'Requirement Complied',
                    data: [<?= $num_of_cleared; ?>, <?= $number_not_cleared?>],
                    borderWidth: 1,
                    backgroundColor: ['rgb(2, 114, 2)', 'rgb(211, 5, 5)']
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>



</body>

</html>