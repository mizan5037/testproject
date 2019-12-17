<?php
//Main Page
require_once 'config.php';
require_once 'lib/session.php';
require_once 'lib/database.php';
//linking Functions
require_once 'lib/functions.php';

isLoggedIn();
if (isset($_GET['page'])) {

nowlog((!isset($_GET['page']) ? 'Home' : $_GET['page']) .' Page View');

}

if (isset($_GET['page']) && $_GET['page'] !== "") {
	if (!file_exists('views/' . $_GET['page'] . '.php')) {
		include 'views/404.php';
	} else {
		include 'views/' . $_GET['page'] . '.php';
	}
}elseif (isset($_GET['report']) && $_GET['report'] !== "") {
	if (!file_exists('report/' . $_GET['report'] . '.php')) {
		include 'views/404.php';
	} else {
		include 'report/' . $_GET['report'] . '.php';
		nowlog((!isset($_GET['report']) ? 'Home' : $_GET['report']) .' report View');
	}
} else {
	include 'views/home.php';
}
