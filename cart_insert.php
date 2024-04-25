<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/dbcon.php';

$pid = $_POST['pid'];
$optname = $_POST['optname'] ?? '';
$qty =  $_POST['qty'];
$total =  $_POST['total'];

if(isset($_SESSION['UID'])){
    $userid = $_SESSION['UID'];
} else {
    $ssid = session_id();
    $userid = '';
}

//pid 장바구니 중복체크
$sql = "SELECT COUNT(*) AS cnt FROM cart WHERE pid = '{$pid}' ";
$result = $mysqli -> query($sql);
$row = $result -> fetch_object(); // $row->cnt

if($result){
    $data = array('result' => $row->cnt);
    echo json_encode($data);
}else{
    $sql = "INSERT INTO cart (pid,userid,ssid,options,cnt,total,regdate) VALUES (
        {$pid},
        '{$userid}',
        '{$ssid}',
        '{$optname}',
        '{$qty}',
        '{$total}',
        now()
    )";
    
    $result = $mysqli -> query($sql);
    if($result){
        $data = array('result' => 'ok');
    } else{
        $data = array('result' => 'fail');
    }
    echo json_encode($data);
}




?>