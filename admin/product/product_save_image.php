<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/dbcon.php';


//관리자 검사
if (!isset($_SESSION['AUID'])) {
  $result_data = array('result' => 'member'); //php 연관배열
  echo json_encode($result_data);
  exit; //프로세스 멈추기
}
//파일 사이즈 검사
if ($_FILES['savefile']['size'] > 10240000) {
  $result_data = array('result' => 'size');
  echo json_encode($result_data);
  exit;
}
//이미지 여부 검사
if (strpos($_FILES['savefile']['type'], 'image') === false) {
  $result_data = array('result' => 'image');
  echo json_encode($result_data);
  exit;
}
//파일 업로드
$save_dir = $_SERVER['DOCUMENT_ROOT'] . '/pinkping/admin/upload';
$fiename = $_FILES["savefile"]["name"]; //insta.jpg
$ext = pathinfo($fiename, PATHINFO_EXTENSION); //jpg
$newfilename = date("YmdHis")
