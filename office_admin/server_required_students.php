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
$table = 'requirement_view';
// Table's primary key
$primaryKey = 'requirement_id';
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    
    array( 'db' => 'student_id', 'dt' => 1 ),
    array('db' => 'student_first_name', 'dt' => 2 ),
    array( 'db' => 'student_last_name', 'dt' => 3 ),
    array( 'db' => 'school_year_and_sem', 'dt' => 4 ),
    array( 'db' => 'sem_name', 'dt' => 5 ),
    array( 'db' => 'clearance_type_name', 'dt' => 6 ),
    array( 'db' => 'is_complied', 'dt' => 7 ),

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
$requirement_details = $_SESSION['requirement_details'];
$clearance_progress_id = $_SESSION['clearance_progress_id'];
$office_id = $_SESSION['office_id'];
$query1 = "requirement_details = $requirement_details AND clearance_progress_id = $clearance_progress_id";
$query2 = "requirement_details = $requirement_details AND office_id = $office_id AND clearance_progress_id = $clearance_progress_id";

if($is_department == 0){
    $where = $query1;
    $data = SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, $where, "");

}else{


    $where = $query2;
    $data = SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, $where, "");


    
}

// print_r($data);
// die();
foreach($data['data'] as $i => $entry){
    $new_entry = array();
    array_push($new_entry, "<td><input name='update[]' class='row' student_id = '$entry[1]' type='checkbox'></td>");

    foreach($entry as $j => $value){
        array_push($new_entry, $value);
    }
    array_push($new_entry, "<td class='primary table-action-container'>
                                <a class='view-link' href='office_clearance_view.php?clearance_type_id=".$entry[1]."&clearance_progress_id=".$entry[2]."&student_id=".$entry[4]."'>View</a>
                            </td>");
    $data['data'][$i] = $new_entry;
}

echo json_encode($data);

