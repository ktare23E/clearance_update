<?php
include_once '../dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,1,0" />
        <!-- stylesheet -->
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link rel="stylesheet" href="../assets/css//sweetalert2.min.css">
        <script src="../assets/js//jquery.js"></script>
        <script src="../assets/js//sweetalert2.all.min.js"></script>
        <script defer src="../assets/js/active.js"></script>

        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>  
        <img src="../images/report-back.jpg" alt="" class="image-back">
        <div class="blur"></div>
        <div class="container">
                <?php include_once 'aside.php' ?>
                
                <div class="select-report-container">
                <form action="retrieve_report.php" method="post">
                        <div class="report-form-container">
                                <label for="">Select School Year And Sem</label>
                                <select name="clearance_progress_id" id="" required>
                                        <option value="" disabled selected>Select School Year And Sem</option>
                                        <?php $clearances = $db->result('clearance_progress_view'); ?>
                                        <?php foreach ($clearances as $clearance) : ?>
                                                <?php $clearance->clearance_progress_id; ?>
                                                <option value="<?= $clearance->clearance_progress_id; ?>"><?= $clearance->school_year_and_sem . ' ' . $clearance->sem_name; ?></option>
                                        <?php endforeach; ?>
                                </select>
                                <!-- <input type="hidden" name="office_id" value="<?= $office_id; ?>"> -->
                        </div>
                        <div class="report-form-container">
                                <select name="student_year" id="year-level-option" required>
                                        <option value="All" selected>All</option>
                                        <option value="1st Year">1st Year</option>
                                        <option value="2nd Year">2nd Year</option>
                                        <option value="3rd Year">3rd Year</option>
                                        <option value="4th Year">4th Year</option>
                                </select>   
                        </div>
                                <div class="report-form-container">
                                <select name="course_id" id="">
                                        <option value="All" selected>All</option>
                                        <?php $courses = $db->result('course');?>
                                        <?php foreach($courses as $course):?>
                                        <option value="<?= $course->course_id; ?>"><?= $course->course_name; ?></option>
                                        <?php endforeach; ?>
                                </select>  
                        </div>
                        <input type="submit" name="submit" value="submit">
                </form>
        </div>
        </div>
        

        <script>
                document.title = "Reports"
        </script>
        
</body>
</html>