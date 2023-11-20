<?php
// Establish a database connection
include_once '../connection.php';

// Query the database to get the total number of users
$query = "SELECT COUNT(*) as total_users FROM new_signing_offices";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$total_users = $row['total_users'];

// Query the database to get the total number of active users
$query = "SELECT COUNT(*) as active_users FROM new_signing_offices WHERE status = 'Active'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$active_users = $row['active_users'];

if ($total_users == 0) {
    echo '0%';
} else {
    // Calculate the percentage of active users
    $percentage = ($active_users / $total_users) * 100;
    echo number_format($percentage, 2) . '%';
}

// // Calculate the percentage of active users
// $percentage = ($active_users / $total_users) * 100;

// // Return the percentage of active users
// echo number_format($percentage, 2) . '%';
?>


