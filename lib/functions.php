<?php

function isLoggedIn()
{
    if (!isset($_SESSION["isLogged"]) || $_SESSION["isLogged"] != true) {
        if (isset($_GET['page'])) {
            header('location: login.php?page=' . $_GET['page']);
            die();
        } else {
            header('location: login.php');
            die();
        }
    }
}

function active($page)
{
    if (isset($_GET['page']) && $_GET['page'] == $page) {
        echo 'class="mm-active"';
    }
}

function notice($notice, $content)
{
    if ($notice == 'success') {
        set_ses('notice', 'success');
    } elseif ($notice == 'error') {
        set_ses('notice', 'danger');
    } else {
        set_ses('notice', 'warning');
    }
    set_ses('notice_content', $content);
    nowlog($content);
}

function nowgo($uri)
{
    global $path;
    header('location: ' . $path . $uri);
    die();
}


function nowlog($attempt)
{
    global $path;
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    //Something to write to txt log
    $log  = "Path: " . $actual_link . PHP_EOL .
        "Date & Time: " . date("F j, Y, g:i a") . PHP_EOL .
        "Attempt: " . $attempt . PHP_EOL .
        "-------------------------" . PHP_EOL;
    //Save string to log, use FILE_APPEND to append.
    $logFolder = '/log';
    if (!file_exists($logFolder)) {
        mkdir($logFolder, 0777, true);
    }
    
    file_put_contents($logFolder . '/' . get_ses('user') . '_log_' . date("j.n.Y") . '.log', $log, FILE_APPEND);
}

function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function loginlog($attempt)
{

    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    //Something to write to txt log
    $log  = "Path: " . $actual_link . PHP_EOL .
        "User IP: " . (get_client_ip() === '::1' ? 'This PC' : get_client_ip()) . PHP_EOL .
        "Date & Time: " . date("F j, Y, g:i a") . PHP_EOL .
        $attempt . PHP_EOL .
        "-------------------------" . PHP_EOL;
    //Save string to log, use FILE_APPEND to append.
    if (!file_exists('./log')) {
        mkdir('./log', 0777, true);
    }
    file_put_contents('./log/' . 'login_log_' . date("j.n.Y") . '.log', $log, FILE_APPEND);
}
