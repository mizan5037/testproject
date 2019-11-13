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
    $logFolder = $_SERVER['DOCUMENT_ROOT'] . $path . '/log';
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


function paginate($table)
{
    $conn = db_connection();
    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }

    $no_of_records_per_page = 10;
    $offset = ($pageno - 1) * $no_of_records_per_page;

    $total_pages_sql = "SELECT COUNT(*) FROM $table";
    $result = mysqli_query($conn, $total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    $out['offset'] = $offset;
    $out['total_pages'] = $total_pages;
    $out['sql'] = "LIMIT ". $offset .", " .$no_of_records_per_page;
    return $out;
}


function links($pageno, $total_pages)
{
    ?>
    <ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if ($pageno <= 1) {
                            echo 'disabled';
                        } ?>">
            <a href="<?php if ($pageno <= 1) {
                                echo '#';
                            } else {
                                echo "?pageno=" . ($pageno - 1);
                            } ?>">Prev</a>
        </li>
        <li class="<?php if ($pageno >= $total_pages) {
                            echo 'disabled';
                        } ?>">
            <a href="<?php if ($pageno >= $total_pages) {
                                echo '#';
                            } else {
                                echo "?pageno=" . ($pageno + 1);
                            } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
<?php
}


function getimg($img){
    global $uploadpath;
    global $path;

    $image = $path . $uploadpath . $img;
	if (file_exists($_SERVER['DOCUMENT_ROOT'] . $image)) {
        echo $image;
    }else{
        echo $path . $uploadpath . 'noimg.png';
    }
}