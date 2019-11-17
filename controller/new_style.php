<?php

if (isset($_POST['stylenumber']) && $_POST['styledescription'] != '' && isset($_POST['fabricdetails']) && isset($_POST['protono']) && isset($_POST['wash']) && $_POST['size'] != '' && isset($_POST['qty']) && isset($_POST['trim_name'])) {

    $imageFilename = '';
    $error = '';

    if ($_FILES['img']['size'] !== 0) {

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
            $error .= "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($imageFilename)) {
            $error .= " <br>Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["img"]["size"] > 2000000) {
            $error .= " <br>Sorry, your file is too large. Maximum File size Allowed 2MB.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $error .= " <br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $error .= " <br>Sorry, your file was not uploaded.";
            $imageFilename = '';
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $path . $uploadpath . $imageFilename)) {
                // echo "The file " . basename($_FILES["img"]["name"]) . " has been uploaded.<br>";
                // echo $imageFilename;
            } else {
                $error .= " <br>Sorry, there was an error uploading your file.";
                $imageFilename = '';
            }
        }
    }

    $conn             = db_connection();
    $stylenumber      = mysqli_real_escape_string($conn, $_POST['stylenumber']);
    $styledescription = mysqli_real_escape_string($conn, $_POST['styledescription']);
    $fabricdetails    = mysqli_real_escape_string($conn, $_POST['fabricdetails']);
    $protono          = mysqli_real_escape_string($conn, $_POST['protono']);
    $wash             = mysqli_real_escape_string($conn, $_POST['wash']);
    $user_id          = get_ses('user_id');

    $sql = "INSERT INTO style (StyleNumber,StyleDescription,StyleWash,StyleProto,StyleImage,StyleFabricDetails,AddedBy)

		   	values('$stylenumber','$styledescription','$wash','$protono','$imageFilename','$fabricdetails','$user_id')";

    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
        notice('success', 'New Style Added Successfully.');
    } else {
        notice('error', 'New Style Added Failed.');
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }

    //array TRIMS & ACCESSORIES
    $trim_name          = ($_POST['trim_name']);
    $trim_description   = ($_POST['trim_description']);

    for ($i = 0; $i < sizeof($trim_name); $i++) {

        $sql = "INSERT INTO trimsaccess (TrimsAccessStyleID,TrimsAccessName,TrimsAccessDescription,AddedBy)

		   		values('$last_id','$trim_name[$i]','$trim_description[$i]','$user_id')";

        if (mysqli_query($conn, $sql)) {
            notice('success', 'New Style Added Successfully.');
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }
    }

    //array Item Requirments
    $size = ($_POST['size']);
    $item = ($_POST['item']);
    $qty  = ($_POST['qty']);


    for ($i = 0; $i < sizeof($size); $i++) {

        $sql = "INSERT INTO itemrequirment (ItemRequirmentStyleID,ItemRequirmentItemID,ItemRequirmentSize,ItemRequirmentQty,AddedBy)

		   		values('$last_id','$item[$i]','$size[$i]','$qty[$i]','$user_id')";

        if (mysqli_query($conn, $sql)) {
            notice('success', 'New Style Added Successfully.<br>' . $error);
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn)  . $error);
        }
    }

    nowgo('/index.php?page=all_style');
} else {
    if (isset($_POST['submit'])) {
        notice('error', 'All fields should be filled up!');
    }
}
