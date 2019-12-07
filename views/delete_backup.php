<?php

if (get_ses('designation') == 1) {
    if (isset($_GET['name']) && $_GET['name'] != '') {
        $file = $_SERVER['DOCUMENT_ROOT'] . $path . '/db/' . $_GET['name'];
        if (file_exists($file)) {
            unlink($file);
        }
        notice('success', 'Database Deleted Successfully');
        nowgo('/index.php?page=user');
    } else {
        notice('error', 'Something is wrong!!');
        nowgo('/index.php?page=user');
    }
}else{
    notice('error', 'You are not authorized to delete a backup database!!');
        nowgo('/index.php?page=user');
    
}
