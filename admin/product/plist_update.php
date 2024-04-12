<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/admin/inc/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/dbcon.php';

$pid = $_REQUEST['pid'];
$ismain = $_REQUEST['ismain'] ?? [];
$isnew = $_REQUEST['isnew'] ?? [];
$isbest = $_REQUEST['isbest'] ?? [];
$isrecom = $_REQUEST['isrecom'] ?? [];
$status = $_REQUEST['status'] ?? [];

print_r($pid);

print_r($ismain);

