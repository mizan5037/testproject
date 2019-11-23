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

    $out['page_no'] = $pageno;
    $out['total_pages'] = $total_pages;
    $out['sql'] = " LIMIT " . $offset . ", " . $no_of_records_per_page;
    return $out;
}

function add_query_to_url($query, $value)
{
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);

    if (isset($queries['pageno'])) {
        $query = $_GET;
        $query['pageno'] = $value;
        $actual_link = $_SERVER['PHP_SELF'] . '?' .  http_build_query($query);
    } else {
        $actual_link .= (parse_url($actual_link, PHP_URL_QUERY) ? '&' : '?') . $query . '=' . $value;
    }
    return $actual_link;
}

/*
========================================
##Pagination Implementation##
first call pagination()

$paginate = paginate('TableName');
$add_sql = $paginate['sql'];
$page_no = $paginate['page_no'];
$total_pages = $paginate['total_pages'];
$sql = "Some sql" . $add_sql;

-------------------------------------------------
$count = ($page_no * 10) - 9;
-------------------------------------------------

now place this code where the page link should show
<br><br>
<div class="row">
    <div class="col-md-12">
        <?php
        links($page_no, $total_pages);
        ?>
    </div>
</div>
=========================================
*/

function links($pageno, $total_pages)
{
    ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?= $pageno <= 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="<?= add_query_to_url('pageno', 1) ?>" tabindex="-1">First</a>
            </li>
            <li class="page-item <?= $pageno <= 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="<?= add_query_to_url('pageno', ($pageno - 1)) ?>">Previous</a>
            </li>
            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                <li class="page-item <?= $pageno == $i ? 'active' : '' ?>"><a class="page-link" href="<?= add_query_to_url('pageno', $i) ?>"><?= $i ?></a></li>
            <?php } ?>
            <li class="page-item <?= $pageno >= $total_pages ? 'disabled' : '' ?>">
                <a class="page-link" href="<?= add_query_to_url('pageno', ($pageno + 1)) ?>">Next</a>
            </li>
            <li class="page-item <?= $pageno >= $total_pages ? 'disabled' : '' ?>">
                <a class="page-link" href="<?= add_query_to_url('pageno', $total_pages) ?>">Last</a>
            </li>
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            <li class="page-item">
                <form style="white-space: nowrap;">
                    <?php foreach ($_GET as $key => $value) {
                            if ($key != 'pageno') {
                                echo ("<input type='hidden' name='$key' value='$value'/>");
                            }
                        } ?>
                    <input type="number" name="pageno" max="<?=$total_pages?>" min="1" style="width:100px !important; height:35px; border: none; border:1px solid #dee2e6; padding: 8px 12px;" placeholder="Page No">
                    <input type="submit" style=" height:35px; margin-top:-3px; padding: 8px 12px;" class="btn btn-sm btn-outline-success" value="GO">
                </form>
            </li>
        </ul>
    </nav>
<?php
}


function getimg($img)
{
    global $uploadpath;
    global $path;

    $image = $path . $uploadpath . $img;
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $image)) {
        echo $image;
    } else {
        echo $path . $uploadpath . 'noimg.png';
    }
}

function getcount($table, $column)
{
    $conn = db_connection();
    $sql = "SELECT COUNT($column) as total FROM $table WHERE Status = 1";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    return $row['total'];
}
