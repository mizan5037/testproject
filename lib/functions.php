<?php

function isLoggedIn()
{
    if (!isset($_SESSION["isLogged"]) || $_SESSION["isLogged"] != true) {
        if (isset($_GET['page'])) {
            header('location: login.php?page=' . $_GET['page']);
        } else {
            header('location: login.php');
        }

        //echo "Not logged In";
        return false;
    }
}

function active($page)
{
    if (isset($_GET['page']) && $_GET['page'] == $page) {
        echo 'class="mm-active"';
    }
}

function notice($notice, $content){
    if($notice == 'success'){
        set_ses('notice', 'success');
    }elseif($notice == 'error'){
        set_ses('notice', 'danger');
    }else{
        set_ses('notice', 'warning');
    }
    set_ses('notice_content', $content);
}

function nowgo($uri){
    global $path;
    header('location: ' . $path . $uri);
    die();
}
