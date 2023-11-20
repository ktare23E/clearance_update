
<?php 
    // $conn = mysqli_connect('localhost', 'root', '', 'clearance');

    //     if(isset($_POST['import'])){
    //         // Check if the file is a CSV file
    //         $fileType = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    //         if($fileType != 'csv') {
    //         echo "Error: Please upload a CSV file.";
    //         return;
    //         }
        
    //         $fileName = $_FILES['file']['tmp_name'];
        
    //         if($_FILES['file']['size'] > 0){
    //         $file = fopen($fileName, "r");
        
    //         while(($column = fgetcsv($file,1000,",")) !== FALSE){
    //             // Check if the student already exists
    //             $sqlCheck = "SELECT * FROM student WHERE student_id = '" . $column[0] . "'";
    //             $resultCheck = mysqli_query($conn, $sqlCheck);
    //             if(mysqli_num_rows($resultCheck) > 0) {
    //             // Student already exists
    //             echo '<a href="student.php">Go back</a><br>';
    //             echo "Error: Student with ID " . $column[0] . " already exists in the database.";
    //             return;
    //             }
        
    //             $sqlInsert = "INSERT into student (student_id, student_first_name, student_last_name,student_year, course_id, office_id, student_gender,student_email, student_username, student_password,student_status) VALUES ('".$column[0]."','".$column[1]."','".$column[2]."','".$column[3]."','".$column[4]."','".$column[5]."', '".$column[6]."', '".$column[7]."', '".$column[8]."', '".$column[9]."','".$column[10]."')";
    //             $result = mysqli_query($conn, $sqlInsert);
        
    //             if(!empty($result)){
    //             //echo "CSV File has been successfully Imported.";
    //             header("Location:student.php");
    //             }else{
    //             echo "Problem in Importing CSV File.";
    //             }
    //         }
    //     }
    // }
?>

    <?php

include_once '../connection.php';
$year_level = "";

if (isset($_POST['import'])) {
    // Check if the file is a CSV file
    $fileType = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    if ($fileType != 'csv') {
        echo "<a href='student.php'>Back</a><br>";
        echo "Error: Please upload a CSV file.";
        return;
    }

    $fileName = $_FILES['file']['tmp_name'];

    if ($_FILES['file']['size'] > 0) {
        $file = fopen($fileName, "r");

        while (($column = fgetcsv($file, 2000, ",")) !== FALSE) {
            // Check if the student already exists
            $sqlCheck = "SELECT * FROM student WHERE student_id = '" . $column[0] . "'";
            $resultCheck = mysqli_query($conn, $sqlCheck);


            $query = "SELECT * FROM course where course_id = '$column[5]'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);


            // print_r($row);
            // die();

            $office_id = $row['office_id'];

            // echo $office_id;
            // die();

            if($column[4] == "1"){
                $year_level = "1st Year";
            }else if($column[4] == "2"){
                $year_level = "2nd Year";
            }else if($column[4] == "3"){
                $year_level = "3rd Year";
            }else if($column[4] == "4"){
                $year_level = "4th Year";
            }

            if (mysqli_num_rows($resultCheck) > 0) {
                // Student already exists, update existing data
                $sqlUpdate = "UPDATE student SET student_id = '".$column[0]."', student_first_name = '" . addslashes($column[1]) . "', student_middle_name = '".addslashes($column[2])."', student_last_name = '" . addslashes($column[3]) . "', student_year = '" . $year_level . "', course_id = '" . $column[5] . "', office_id = '" . $office_id . "', student_gender = '" . $column[6] . "', student_email = '" . addslashes($column[7]) . "', student_password = '" . addslashes($column[8]) . "', student_status = '" . $column[9] . "', student_type = '".$column[10]."' WHERE student_id = '" . $column[0] . "'";
                $result = mysqli_query($conn, $sqlUpdate);

                if (!empty($result)) {
                    // echo "CSV File has been successfully Imported.";
                    header("Location:student.php");
                } else {
                    echo "<a href='student.php'>Back</a><br>";
                    echo "Problem in updating existing data.";
                }
            } else {
                // Insert new student data
                $sqlInsert = "INSERT into student (student_id, student_first_name, student_middle_name, student_last_name,student_year, course_id, student_gender,student_email, student_password,student_status, student_type,office_id) VALUES ('".$column[0]."','" .addslashes($column[1]). "','" .addslashes($column[2]). "','" .addslashes($column[3]). "','" .$year_level. "','" .$column[5]. "', '" .$column[6]. "', '" .addslashes($column[7]). "', '" .addslashes($column[8]). "','" .$column[9]. "','".$column[10]."','" .$office_id. "')";
                $result2 = mysqli_query($conn, $sqlInsert);

                
                if (!empty($result2)) {
                    //echo "CSV File has been successfully Imported.";
                    header("Location:student.php");
                } else {
                    echo "<a href='student.php'>Back</a><br>";
                    echo "Problem in Importing CSV File.";
                }
            }
        }
    }
}
?>

