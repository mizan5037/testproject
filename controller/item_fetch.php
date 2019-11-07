
<?php

require_once '../config.php';
require_once '../lib/session.php';
require_once '../lib/database.php';
//linking Functions
require_once '../lib/functions.php';

$conn = db_connection();

    $query = "SELECT * FROM item where status=1";

    if (isset($_POST["search"]) && $_POST["search"]["value"] !='') {
        $query .= '
 AND ItemName LIKE "%' . $_POST["search"]["value"] . '%" 
 OR ItemDescription LIKE "%' . $_POST["search"]["value"] . '%" 
 ';
    }

    if (isset($_POST["order"])) {
        $query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' 
 ';
    } else {
        $query .= ' ORDER BY ItemID DESC ';
    }

    $query1 = '';

    // if ($_POST["length"] != -1) {
    //     $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    // }

    $number_filter_row = mysqli_num_rows(mysqli_query($conn, $query));

    $result = mysqli_query($conn, $query . $query1);

    $data = array();
    while ($row = mysqli_fetch_array($result)) {
        $sub_array = array();
        $sub_array[] = $row["ItemName"];
        $sub_array[] = $row["ItemDescription"];
        $sub_array[] = $row["ItemDescription"];
        $sub_array[] = $row["ItemID"];
        $sub_array[] = $row["ItemID"];
        $data[] = $sub_array;
    }

    function get_all_data($conn)
    {
        $query = "SELECT * FROM item where status=1";
        $result = mysqli_query($conn, $query);
        return mysqli_num_rows($result);
    }

    $output = array(
        "draw"    => isset ( $_POST['draw'] ) ?
        intval( $_POSTs['draw'] ) :
        0,
        "recordsTotal"  =>  get_all_data($conn),
        "recordsFiltered" => $number_filter_row,
        "data"    => $data
    );

    echo json_encode($output);




?>