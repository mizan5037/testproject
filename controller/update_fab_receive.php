<?php

$conn = db_connection();

if (isset($_GET['fab_Rec_id']) && isset($_GET['buyer_id'])) {
    $fab_rec_id = $_GET['fab_Rec_id'];
    $buyer_id = $_GET['buyer_id'];
    $sql = "SELECT * FROM fab_receive WHERE FabReceiveID = '$fab_rec_id' AND Status = '1'";
    $fab_all = mysqli_fetch_assoc(mysqli_query($conn, $sql));


    if (isset($_POST['fabRc']) && isset($_POST['receivefab']) && isset($_POST['receiveroll']) && isset($_POST['sortexs'])) {


        $shade       = ($_POST['shade']);
        $shrinkage   = ($_POST['shrinkage']);
        $width       = ($_POST['width']);
        $receivefab  = ($_POST['receivefab']);
        $receiveroll = ($_POST['receiveroll']);
        $sortexs     = ($_POST['sortexs']);
        $user_id     = (get_ses('user_id'));


        $sql = "UPDATE fab_receive SET Shade='$shade', Shrinkage='$shrinkage', Width='$width', ReceivedFab='$receivefab', ReceivedRoll='$receiveroll', Shortage='$sortexs', AddedBy='$user_id' WHERE FabReceiveID ='$fab_rec_id'";

        if (mysqli_query($conn, $sql)) {
            notice('success', 'Fabric Updated Successfully');
            nowgo('/index.php?page=single_fab_received&fabRecBuyer=' . $buyer_id . '&fbRecPOID=' . $fab_all['POID'] . '&fbRecStyle=' . $fab_all['StyleID'] . '&fbRecColor=' . $fab_all['Color']);
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }
    }
} elseif (isset($_GET['fab_Rec_other_id'])) {
    $fab_Rec_other_id = $_GET['fab_Rec_other_id'];
    $sql = "SELECT * FROM fab_receive_other WHERE id = '$fab_Rec_other_id' AND Status = '1'";
    $fab_other_all = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    if (isset($_POST['fabRcOther']) && isset($_POST['receivefab']) && isset($_POST['receiveroll']) && isset($_POST['sortexs'])) {
        $shade       = ($_POST['shade']);
        $shrinkage   = ($_POST['shrinkage']);
        $width       = ($_POST['width']);
        $receivefab  = ($_POST['receivefab']);
        $receiveroll = ($_POST['receiveroll']);
        $sortexs     = ($_POST['sortexs']);
        $user_id     = (get_ses('user_id'));



        $sql = "UPDATE fab_receive_other SET Shade= '$shade',Shrinkage='$shrinkage',Width='$width' ,ReceivedFab= '$receivefab' ,ReceivedRoll='$receiveroll',Shortage='$sortexs',AddedBy='$user_id' WHERE id='$fab_Rec_other_id'";

        if (mysqli_query($conn, $sql)) {
            notice('success', 'Fabric Updated (Contrast,Pocketing) Successfully');
            nowgo('/index.php?page=single_fab_received&fabRecOtherBuyerid='.$fab_other_all['BuyerID'].'&ContrastPocket='. $fab_other_all['ContrastPocket']);
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }

    }
}





function getname($table, $column, $idColumn, $id)
{
    global $conn;
    $sql   = "SELECT $column FROM $table WHERE $idColumn = $id";
    $query = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    if ($query) {
        return $query[$column];
    } else {
        return 'No Related Data Found!';
    }
}
