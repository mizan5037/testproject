<?php

$filename='db/database_backup_'.date('G_i_s_a_M_d_Y').'.sql';

include_once($_SERVER['DOCUMENT_ROOT'] . $path . '/vendor/ifsnop/mysqldump-php/src/Ifsnop/Mysqldump/Mysqldump.php');
$dump = new Ifsnop\Mysqldump\Mysqldump('mysql:host='.HOST.';dbname='.DBNAME, USER, PASS);
$dump->start($filename);
notice('success', 'Database Backed Up Successfully');
nowgo('/index.php?page=user');