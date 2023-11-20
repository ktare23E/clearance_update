<?php
    // Establish a database connection
    include_once '../connection.php';

    // Query the database to get the total number of users
    $query = "SELECT COUNT(*) as total_users FROM new_signing_offices WHERE status = 'Active'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Return the total number of users
    echo $row['total_users'];
?>