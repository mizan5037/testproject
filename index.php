<?php
//Main Page
require_once 'config.php';
require_once 'lib/session.php';
require_once 'lib/database.php';
//linking Functions
require_once 'lib/functions.php';

isLoggedIn();

// $todaysDate=date('m/d/Y h: i',time());

// die($todaysDate);

if (isset($_GET['page']) && $_GET['page'] !== "") {
	if (!file_exists('views/' . $_GET['page'] . '.php')) {
		include 'views/404.php';
	} else {
		include 'views/' . $_GET['page'] . '.php';
	}
} else {
	include 'views/home.php';
}
