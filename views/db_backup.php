<?php
include_once($_SERVER['DOCUMENT_ROOT'] . $path . '/vendor/ifsnop/mysqldump-php/src/Ifsnop/Mysqldump/Mysqldump.php');
$dump = new Ifsnop\Mysqldump\Mysqldump('mysql:host='.HOST.';dbname='.DBNAME, USER, PASS);
$dump->start('dump.sql');

//HOST, USER, PASS, DBNAME