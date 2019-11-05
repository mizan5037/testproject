<?php 

if(isset($_POST['submit']) && $_POST['submit'] == 'Save' && isset($_POST['title']) && $_POST['title'] != '' ){
    $title = $_POST['title'];
    $poid = $_POST['po'];
    $style = $_POST['style'];
    $user_id = get_ses('user_id');

    $sql = "";
}