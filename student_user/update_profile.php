<?php
session_start();
// Connect to the database
include_once '../connection.php';

$id = $_SESSION['student_id'];
// Check for POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Check if a file was uploaded
  if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
    // Get the file extension
    $ext = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);
    // Generate a unique file name
    $filename = uniqid() . '.' . $ext;
    // Move the uploaded file to a permanent location
    move_uploaded_file($_FILES['profile_image']['tmp_name'], "../admin/uploads/$filename");
    // Update the user's profile image path in the database
    $query = "UPDATE student SET student_profile='$filename' WHERE student_id ='$id'";
    mysqli_query($conn, $query);
  }
  // Update other profile data as needed
  // ...
  header('Location: student_profile.php');
  // 
}




