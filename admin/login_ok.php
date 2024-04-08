<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/dbcon.php';

$userid = $_POST['userid'];
$passwd = $_POST['passwd'];
$passwd = hash('sha512', $passwd);

$sql = "SELECT * FROM admins where userid='{$userid}' and passwd = '{$passwd}'";
$result = $mysqli->query($sql);
$rs = $result->fetch_object();
