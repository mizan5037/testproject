<?php

$conn    = db_connection();
$user_id = get_ses('user_id');

//edit table by ajax
if (isset($_POST['form']) && $_POST['form'] = "editDetails") {

    $token = $_POST["token"];

    if (get_ses('token') === $token) {

        $eid   = mysqli_real_escape_string($conn, $_POST["id"]);
        $cname = mysqli_real_escape_string($conn, $_POST['cname']);
        $text  = mysqli_real_escape_string($conn, $_POST["text"]);


        $sql = "UPDATE style SET " . $cname . "='" . $text . "' WHERE StyleID = '" . $eid . "'";
        if (mysqli_query($conn, $sql)) {
            echo 'Data Updated';
        } else {
            echo $sql . "<br>" . mysqli_error($conn);
        }
    }
    die();
}

//Delete item requiremwnts
if (isset($_GET['delete'])) {
    $itemid = mysqli_real_escape_string($conn, $_GET['delete']);
    $id     = mysqli_real_escape_string($conn, $_GET['id']);
    $sql    = "DELETE FROM itemrequirment WHERE ItemRequirmentID=" . $itemid;

    if (mysqli_query($conn, $sql)) {
        notice('success', 'Item Deleted Successfully');
        nowgo('/index.php?page=single_style&id=' . $id);
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
}

//delete trims & Accessories
if (isset($_GET['deletet'])) {
    $tid = mysqli_real_escape_string($conn, $_GET['deletet']);
    $id  = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "DELETE FROM trimsaccess where TrimsAccessID=" . $tid;

    if (mysqli_query($conn, $sql)) {
        notice('success', 'TRIMS & ACCESSORIES Deleted Successfully');
        nowgo('/index.php?page=single_style&id=' . $id);
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
}

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
} else {
    nowgo('/index.php?page=all_style');
}

if (isset($_POST['size']) && isset($_POST['item']) && isset($_POST['qty'])) {
    //array Item Requirments
    $size = mysqli_real_escape_string($conn, $_POST['size']);
    $item = mysqli_real_escape_string($conn, $_POST['item']);
    $qty  = mysqli_real_escape_string($conn, $_POST['qty']);


    for ($i = 0; $i < sizeof($size); $i++) {
        if ($size[$i] != '') {
            $sqli = "INSERT INTO itemrequirment (ItemRequirmentStyleID,ItemRequirmentItemID,ItemRequirmentSize,ItemRequirmentQty,AddedBy)

            values('$id','$item[$i]','$size[$i]','$qty[$i]','$user_id')";

            if (mysqli_query($conn, $sqli)) {
                notice('success', 'New Item Added Successfully.');
                
            } else {
                notice('error', $sql . "<br>" . mysqli_error($conn));
            }
        }
    }
    nowgo('/index.php?page=single_style&id=' . $id);
}


if (isset($_POST['trim_name']) && isset($_POST['trim_description'])) {
    //array TRIMS & ACCESSORIES
    $trim_name        = mysqli_real_escape_string($conn, $_POST['trim_name']);
    $trim_description = mysqli_real_escape_string($conn, $_POST['trim_description']);

    for ($i = 0; $i < sizeof($trim_name); $i++) {

        if ($trim_name[$i] != '') {
            $sql = "INSERT INTO trimsaccess (TrimsAccessStyleID,TrimsAccessName,TrimsAccessDescription,AddedBy)

		   		values('$id','$trim_name[$i]','$trim_description[$i]','$user_id')";

            if (mysqli_query($conn, $sql)) {
                notice('success', 'New TRIMS & ACCESSORIES Added Successfully.');
                
            } else {
                notice('error', $sql . "<br>" . mysqli_error($conn));
            }
        }
        
    }
    nowgo('/index.php?page=single_style&id=' . $id);
}



$sql = "SELECT * FROM style where StyleID='$id'";

$item = mysqli_fetch_assoc(mysqli_query($conn, $sql));


function getDivision($ssid)
{
    global $conn;
    $sql    = "SELECT po.Division FROM po LEFT JOIN order_description ON  po.POID = order_description.POID WHERE order_description.StyleID = '$ssid'";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    if ($result) {
        return $result['Division'];
    } else {
        return 'No Related PO Found';
    }
}

function getPrice($ssid)
{
    global $conn;
    $sql    = "SELECT masterlc_description.Price, masterlc_description.StyleID, masterlc.MasterLCCurrency FROM masterlc_description LEFT JOIN masterlc ON masterlc_description.MasterLCID = masterlc.MasterLCID WHERE masterlc_description.StyleID = '$ssid'";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    if ($result) {
        return $result['MasterLCCurrency'] . " " . $result['Price'];
    } else {
        return 'No Related LC Found';
    }
}


if (isset($_POST['style_id']) && $_POST['style_id'] != '' && $_FILES['img']['size'] !== 0) {

    $error = '';

    $target_file   = basename($_FILES["img"]["name"]);
    $uploadOk      = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $imageFilename = rand(100000, 1000000000) . '_' . date("Y_M_d") . '_' . time() . '_' . get_ses('user_id') . '.' . $imageFileType;

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if ($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $error .= "File is not an image. <br>";
               $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($imageFilename)) {
        $error .= "Sorry, file already exists. <br>";
               $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["img"]["size"] > 2000000) {
        $error .= "Sorry, your file is too large. Maximum File size Allowed 2MB. <br>";
               $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $error .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed. <br>";
               $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $error .= "Sorry, your file was not uploaded.";
        notice('error', $error);
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $path . $uploadpath . $imageFilename)) {


            // now remove image from server
            $id       = $_POST['style_id'];
            $sql      = "SELECT StyleImage FROM style WHERE StyleID = '$id'";
            $preimage = mysqli_fetch_assoc(mysqli_query($conn, $sql));

            $remove = $_SERVER['DOCUMENT_ROOT'] . $path . $uploadpath . $preimage['StyleImage'];

            if (file_exists($remove)) {
                unlink($remove);
            }

            //now add image link to database
            $sql = "UPDATE style SET StyleImage = '$imageFilename'  WHERE StyleID = '$id'";
            if (mysqli_query($conn, $sql)) {
                notice('success', 'Style image Updated Successfully.');
            } else {
                notice('error', $sql . "<br>" . mysqli_error($conn) . '<br>' . $error);
            }
        } else {
            $error .= " <br>Sorry, there was an error uploading your file.";
            notice('error', $error);
        }
    }
    nowgo('/index.php?page=single_style&id=' . $id);
}
