<?php
    // Establish a database connection
    include_once '../connection.php';

    // Query the database to get the office names with 'Active' status
    $query = "SELECT school_year_and_sem, sem_name FROM clearance_progress_view WHERE status= 'Active'";
    $result = mysqli_query($conn, $query);

    // Loop through the result and display the office names
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['school_year_and_sem'].' - '.$row['sem_name'].' ';
    }

    // Close the database connection
    mysqli_close($conn);
?>
