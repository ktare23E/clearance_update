<?php
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
// DB table to use
$table = 'student_details';
// Table's primary key
$primaryKey = 'student_id';
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'student_id', 'dt' => 1 ),
    array( 'db' => 'student_first_name',  'dt' => 2 ),
    array( 'db' => 'student_last_name',   'dt' => 3 ),
    array( 'db' => 'student_year',     'dt' => 4 ),
    array( 'db' => 'course_name',     'dt' => 5 ),
    array( 'db' => 'student_status',     'dt' => 6 ),
);
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'clearance',
    'host' => 'localhost'
);

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
require( 'ssp.class.php' );
session_start();
    if (!isset($_SESSION['isOffice'])) {
    header("location: ../index.php");
    exit();
    }

$is_department = $_SESSION['is_department'];

if($is_department == 0){
    $data = SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns);

}else{
    $where = "office_id=".$_SESSION['office_id'];
    $data = SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, $where, $where);
    // $data = SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns);
    
}

// $data = SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns );
// print_r($data);
// die();
foreach($data['data'] as $i => $entry){
    $new_entry = array();
    // array_push($new_entry, "<td><input name='update[]' class='row' student_id = '$entry[1]' type='checkbox' /></td>");

    foreach($entry as $j => $value){
        array_push($new_entry, $value);
    }
    array_push($new_entry, "<td class='primary table-action-container'>
    <a class='view-link' href='office_student_view_2.php?details=".$entry[1]."'>View Details</a>
        <input type='hidden' name='student_id' value='".$entry[1]."'> 
    </td>");
    $data['data'][$i] = $new_entry;
}

echo json_encode($data);

?>