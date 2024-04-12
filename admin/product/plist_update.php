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

foreach($pid as $p){
  $ismain = $ismain[$p] ?? 0;
  $isnew = $isnew[$p] ?? 0;
  $isbest = $isbest[$p] ?? 0;
  $isrecom = $isrecom[$p] ?? 0;
  $status = $status[$p] ?? 0;

  $sql  = "UPDATE products set ismain = {$ismain}, isnew = {$isnew}, isbest = {$isbest},isrecom = {$isrecom},status = {$status} WHERE pid ={$p}";
  $result = $mysqli -> query($sql);
}
if($result){
  echo "<script>alert('일괄 수정 완료');history.back();</script>";  
} else{
  echo "<script>alert('일괄 수정 실패');history.back();</script>";
}

