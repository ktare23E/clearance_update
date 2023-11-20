<?php
    // Establish a database connection
    include_once '../connection.php';

    // Query the database to get the office names with 'Active' status
    $query = "SELECT office_name FROM new_signing_offices WHERE status = 'Active' LIMIT 5";
    $result = mysqli_query($conn, $query);

    // Loop through the result and display the office names
    while ($row = mysqli_fetch_assoc($result)) {
        // echo $row['office_name'].'<br>';
        // print_r($row['office_name']).'';

        // echo nl2br("\n $row[office_name]");
        echo $row['office_name'].', ';
    }

    // Close the database connection
    mysqli_close($conn);
?>
