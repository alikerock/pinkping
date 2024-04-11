<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/admin/inc/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/dbcon.php';

$cate1 = $_POST['cate1'] ?? '';
$cate2 = $_POST['cate2'] ?? '';
$cate3 = $_POST['cate3'] ?? '';
$cate = $cate1 . $cate2 . $cate3;

$name  = $_POST['name'];
$content  = rawurldecode($_POST['contents']);
// $thumbnail  = $_POST['thumbnail'];
$price = $_POST['price'];
$sale_price = $_POST['sale_price'] ?? 0;
$sale_ratio = $_POST['sale_ratio'] ?? 0;
$cnt = $_POST['cnt'] ?? 0;
$sale_cnt = $_POST['sale_cnt'] ?? 0;

$ismain = $_POST['ismain'] ?? 0;
$isnew = $_POST['isnew'] ?? 0;
$isbest = $_POST['isbest'] ?? 0;
$isrecom = $_POST['isrecom'] ?? 0;

$locate = $_POST['locate'] ?? 0;
$userid = $_SESSION['AUID'];
$sale_end_date = $_POST['sale_end_date'];

$status = $_POST['status'] ?? 0;
$delivery_fee = $_POST['delivery_fee'] ?? 0;

//파일 사이즈 검사
if ($_FILES['thumbnail']['size'] > 10240000) {
  echo "<script>
    alert('10MB 이하만 업로드해주세요');
    history.back();
  </script>";
  exit;
}
//이미지 여부 검사
if (strpos($_FILES['thumbnail']['type'], 'image') === false) {
  echo "<script>
    alert('이미지만 업로드해주세요');
    history.back();
  </script>";
  exit;
}
//파일 업로드
$save_dir = $_SERVER['DOCUMENT_ROOT'] . '/pinkping/admin/upload/';
$fiename = $_FILES["thumbnail"]["name"]; //insta.jpg
$ext = pathinfo($fiename, PATHINFO_EXTENSION); //jpg
$newfilename = date("YmdHis") . substr(rand(), 0, 6); //202404111137.123123 -> 202404111137123123 
$savefile = $newfilename . '.' . $ext;  //202404111137123123.jpg

if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $save_dir . $savefile)) {
  $thumbnail = "/pinkping/admin/upload/" . $savefile;
} else {
  echo "<script>
  alert('썸네일 등록에 실패했습니다. 관리자에게 문의해주세요');
  history.back();
  </script>";
  exit;
}
$sql = "INSERT INTO products (name,cate,content,thumbnail,price,sale_price,sale_ratio,cnt,sale_cnt,	ismain,isnew,isbest,isrecom,locate,userid,sale_end_date,reg_date,status,delivery_fee) VALUES (
  '{$name}',
  '{$cate}',
  '{$content}',
  '{$thumbnail}',
  '{$price}',
  '{$sale_price}',
  '{$sale_ratio}',
  '{$cnt}',
  '{$sale_cnt}',
  '{$ismain}',
  '{$isnew}',
  '{$isbest}',
  '{$isrecom}',
  '{$locate}',
  '{$userid}',
  '{$sale_end_date}',
   now(),
  '{$status}',
  '{$delivery_fee}'
)";

echo $sql;