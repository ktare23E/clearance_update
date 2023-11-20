<?php
// Establish a database connection
include_once '../connection.php';

// Query the database to get the total number of users
$query = "SELECT COUNT(*) as total_users FROM student";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Query the database to get the total number of active users
$query = "SELECT COUNT(*) as active_users FROM student WHERE student_status = 'Active'";
$result = mysqli_query($conn, $query);
$row_active = mysqli_fetch_assoc($result);

// Return the total number of active users
echo $row_active['active_users'];
?>
