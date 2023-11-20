<?php

$conn = mysqli_connect('localhost', 'root', '', 'clearance');

if($conn->connect_error){
    echo $conn->connect_error;
}