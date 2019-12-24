<?php
require_once '../config.php';
require_once '../lib/session.php';
require_once '../lib/database.php';
//linking Functions
require_once '../lib/functions.php';
$conn = db_connection();

$token = mysqli_real_escape_string($conn, $_POST["token"]);

// po to style
if (get_ses('token') === $token && $_POST["form"] == 'get_style') {

    $po = mysqli_real_escape_string($conn, $_POST["po"]);
    $sql = "SELECT DISTINCT s.StyleID, s.StyleNumber FROM order_description o LEFT JOIN style s ON s.StyleID = o.StyleID WHERE o.POID = '$po'";
    $result = mysqli_query($conn, $sql);
    echo '<option>Select Style</option>';
    while($row = mysqli_fetch_assoc($result)){
        echo '<option value="' . $row['StyleID'] . '">' . $row['StyleNumber'] . '</option>';
    }
}


if (get_ses('token') === $token && $_POST["form"] == 'get_qty') {


    $style = mysqli_real_escape_string($conn, $_POST["style"]);
    $po    = mysqli_real_escape_string($conn, $_POST["po"]);

    $sql    = "SELECT SUM(d.Units) FROM order_description d WHERE d.StyleID = '$style' AND d.POID = '$po'";
    $result = mysqli_query($conn, $sql);
    $row    = mysqli_fetch_assoc($result);
    echo $row['SUM(d.Units)'];

}

if (get_ses('token') === $token && $_POST["form"] == 'style_qty') {


    $style = mysqli_real_escape_string($conn, $_POST["style"]);

    

    $sql    = "SELECT Dzs FROM order_description d WHERE d.StyleID = '$style' ";
    $result = mysqli_query($conn, $sql);
    $row    = mysqli_fetch_assoc($result);
    echo $row['Dzs'];

}

if (get_ses('token') === $token && $_POST["form"] == 'fob_unit_price') {


    $po = mysqli_real_escape_string($conn, $_POST["po"]);

    $sql    = "SELECT FOB FROM po  WHERE POID = '$po' ";
    $result = mysqli_query($conn, $sql);
    $row    = mysqli_fetch_assoc($result);
    echo $row['FOB'];

}

if (get_ses('token') === $token && $_POST["form"] == 'style_qtys') {


    $style = mysqli_real_escape_string($conn, $_POST["styles"]);

    $sql    = "SELECT Dzs FROM order_description  WHERE StyleID = '$style' ";
    $result = mysqli_query($conn, $sql);
    $row    = mysqli_fetch_assoc($result);
    echo $row['Dzs'];

}

if (get_ses('token') === $token && $_POST["form"] == 'fob_unit_prices') {


    $po = mysqli_real_escape_string($conn, $_POST["poos"]);

    $sql    = "SELECT FOB FROM po  WHERE POID = '$po' ";
    $result = mysqli_query($conn, $sql);
    $row    = mysqli_fetch_assoc($result);
    echo $row['FOB'];

}


if (get_ses('token') === $token && $_POST["form"] == 'get_line') {

    $floor = mysqli_real_escape_string($conn, $_POST["floor"]);

    $sql    = "SELECT line, id FROM line WHERE floor = '$floor'";
    $result = mysqli_query($conn, $sql);
    echo '<option>------</option>';
    while($row = mysqli_fetch_assoc($result)){
        echo '<option value="' . $row['id'] . '">' . $row['line'] . '</option>';
    }
  }
// buyer To po
if (get_ses('token') === $token && $_POST["form"] == 'get_po_size_wise') {

    $buyer_id = mysqli_real_escape_string($conn, $_POST["buyer_id"]);

    $sql = "SELECT DISTINCT md.POID,p.PONumber FROM masterlc m LEFT JOIN masterlc_description md ON m.MasterLCID=md.MasterLCID LEFT JOIN po p ON p.POID = md.POID WHERE m.MasterLCBuyer = '$buyer_id'";
    $result = mysqli_query($conn, $sql);
    echo '<option>=======</option>';
     while($row = mysqli_fetch_assoc($result)){
         echo '<option value="' . $row['POID'] . '">' . $row['PONumber'] . '</option>';
     }

}

// buyer to style
if (get_ses('token') === $token && $_POST["form"] == 'get_buyer_fab') {

    $buyer_id = mysqli_real_escape_string($conn, $_POST["buyer_id"]);

    $sql = "SELECT DISTINCT s.StyleID,s.StyleNumber
            FROM fab_relaxation f
            LEFT JOIN style s ON f.StyleID = s.StyleID
            WHERE f.Status='1' AND s.Status ='1' AND f.BuyerID = '$buyer_id'";
    $result = mysqli_query($conn, $sql);
    echo '<option>Select Style Number</option>';
     while($row = mysqli_fetch_assoc($result)){
         echo '<option value="' . $row['StyleID'] . '">' . $row['StyleNumber'] . '</option>';
     }

}

// style to colour for fab Relaxation
if (get_ses('token') === $token && $_POST["form"] == 'get_style_color_fab') {

    $style_id = mysqli_real_escape_string($conn, $_POST["style_id"]);

    $sql = "SELECT DISTINCT c.id,c.color
            FROM fab_relaxation f
            LEFT JOIN color c ON f.Color=c.id
            WHERE f.Status='1' AND c.status = '1' AND f.StyleID = '$style_id'";
    $result = mysqli_query($conn, $sql);
    echo '<option>Select Style Number</option>';
     while($row = mysqli_fetch_assoc($result)){
         echo '<option value="' . $row['id'] . '">' . $row['color'] . '</option>';
     }

}

// Style to Color
if (get_ses('token') === $token && $_POST["form"] == 'get_color') {

    $style_id = mysqli_real_escape_string($conn, $_POST["style"]);

    $sql = "SELECT DISTINCT c.id,c.color FROM order_description od LEFT JOIN style s ON s.styleID = od.StyleID LEFT JOIN color c ON od.Color = c.id WHERE od.Status = '1' AND s.StyleID = '$style_id'";
    $result = mysqli_query($conn, $sql);
    echo '<option>Select Color</option>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['id'] . '">' . $row['color'] . '</option>';
    }
}

