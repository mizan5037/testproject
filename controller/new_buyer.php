<?php

if (isset($_POST['buyer_name']) && $_POST['buyer_name'] != '' && isset($_POST['email']) && isset($_POST['buyer_phone'])&& isset($_POST['first_address']) && isset($_POST['second_address'])&& isset($_POST['city']) && isset($_POST['country'])&& isset($_POST['bying_house'])&& isset($_POST['contact_person_name'])&& isset($_POST['contact_person_designation'])&& isset($_POST['contact_person_phone'])) {

	$conn                       = db_connection();
	$buyer_name                 = mysqli_real_escape_string($conn, $_POST['buyer_name']);
	$email                      = mysqli_real_escape_string($conn, $_POST['email']);
	$buyer_phone                = mysqli_real_escape_string($conn, $_POST['buyer_phone']);
	$first_address              = mysqli_real_escape_string($conn, $_POST['first_address']);
	$second_address             = mysqli_real_escape_string($conn, $_POST['second_address']);
	$city                       = mysqli_real_escape_string($conn, $_POST['city']);
	$country                    = mysqli_real_escape_string($conn, $_POST['country']);
	$bying_house                = mysqli_real_escape_string($conn, $_POST['bying_house']);
	$contact_person_name        = mysqli_real_escape_string($conn, $_POST['contact_person_name']);
	$contact_person_designation = mysqli_real_escape_string($conn, $_POST['contact_person_designation']);
	$contact_person_phone       = mysqli_real_escape_string($conn, $_POST['contact_person_phone']);
	$user_id                    = get_ses('user_id');

	$sql = "INSERT INTO buyer (BuyerName,BuyerEmail,BuyerPhone,BuyerAddress1,BuyerAddress2,BuyerCity,BuyerCountry,BuyerBuyingHouseName,BuyerContactPerson,ContactPersonDesignation,ContactPersonPhone,AddedBy)

	values('$buyer_name','$email','$buyer_phone','$first_address','$second_address','$city','$country','$bying_house','$contact_person_name','$contact_person_designation','$contact_person_phone','$user_id')";

	if (mysqli_query($conn, $sql)) {
		notice('success', 'New Buyer added Successfully');
	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
	}
	nowgo('/index.php?page=all_buyer');

}


