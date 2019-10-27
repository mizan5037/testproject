<?php session_start();
require_once 'lib/session.php';
require_once 'lib/functions.php';
nowlog('Logout');
session_unset();
session_destroy();
if(isset($_GET['page'])){
    header('location: login.php?page=' . $_GET['page']);
}else{
    header('location: login.php');
}
