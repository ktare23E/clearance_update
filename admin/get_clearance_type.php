<?php
    // Establish a database connection
    include_once '../connection.php';
    
    // Query the database to get the office names with 'Active' status
    $query = "SELECT clearance_type_name FROM clearance_type";
    $result = mysqli_query($conn, $query);

    // Loop through the result and display the office names
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['clearance_type_name'].' ';
    }

    // Close the database connection
    mysqli_close($conn);
?>
