<?php


include_once '../connection.php';

session_start();
$admin_id = $_SESSION['admin_id'];
$clearance_progress_id = $_POST['clearance_progress_id'];
$clearance_status = '1';
$current_date = date('Y-m-d');

if (isset($_POST['import'])) {
    // Check if the file is a CSV file
    $fileType = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    if ($fileType != 'csv') {
        echo '<a href="clearance.php">Back</a><br>';
        echo "Error: Please upload a CSV file.";
        return;
    }

    $fileName = $_FILES['file']['tmp_name'];

    if ($_FILES['file']['size'] > 0) {
        $file = fopen($fileName, "r");

        while (($column = fgetcsv($file, 1000, ",")) !== FALSE) {

            $query = "SELECT * FROM student WHERE student_id = '".$column[0]."'";
            // echo $query;
            // die();
            $result2 = mysqli_query($conn,$query);
            $row2 = mysqli_fetch_assoc($result2);

            if($result2->num_rows < 1){
                echo "<a href='clearance.php'>Back</a><br>";
                echo "This student '".$column[0]."' does not exist. Please register this student first before creating a clearance.";
                var_dump($column[0]);
                die();
            }
          // print($row2);
            $course_id = $row2['course_id'];
            $office_id = $row2['office_id'];


            // Check if the student already exists
            $sqlCheck = "SELECT * FROM clearance WHERE student_id = '" . $column[0] . "' AND clearance_progress_id = $clearance_progress_id ";
            $result= mysqli_query($conn,$sqlCheck);
            $row = mysqli_fetch_assoc($result);
            
            $clearance_id = $row['clearance_id'];

            if (mysqli_num_rows($result) > 0) {
                // Clearance already exists, update existing data
                $sqlUpdate = "UPDATE clearance SET clearance_status = '".$clearance_status."', student_id = '" . $column[0] . "', clearance_progress_id = '" . $clearance_progress_id . "', clearance_type_id = '" . $column[1] . "', course_id = '" . $course_id . "', office_id = '" . $office_id . "', date_created = '" . $current_date . "' WHERE clearance_id = '".$clearance_id."'";
                $result = mysqli_query($conn, $sqlUpdate);

                if (!empty($result)) {
                    //echo "CSV File has been successfully Imported.";
                    header("Location:clearance.php");
                } else {
                    echo '<a href="clearance.php">Back</a><br>';
                    echo "Problem in updating existing data.";
                }
            } else {
                // Insert new clearance data
                $sqlInsert = "INSERT INTO clearance ( student_id, clearance_type_id, date_created,clearance_status,clearance_progress_id,course_id,office_id) VALUES ('" .$column[0] . "','" . $column[1] . "','" . $current_date . "','" . $clearance_status . "','" . $clearance_progress_id . "','" . $course_id . "', '" . $office_id . "')";
                $result = mysqli_query($conn, $sqlInsert);

                if (!empty($result)) {
                    //echo "CSV File has been successfully Imported.";
                    header("Location:clearance.php");
                } else {
                    echo '<a href="clearance.php">Back</a><br>';
                    echo "Problem in Importing CSV File.";
                }
            }
        }
    }
}



?>
