<?php session_start();

session_unset();
session_destroy();
if(isset($_GET['page'])){
    header('location: index.php?page=' . $_GET['page']);
}else{
    header('location: index.php');
}
