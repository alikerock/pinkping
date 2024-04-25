<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/dbcon.php';

$userid = $_POST['userid'];
$pid = $_POST['pid'];
$grand_total = $_POST['grand_total'];
$ucid = $_POST['coupon']??'';

$sql = "INSERT INTO orders (userid,pid,total_price,regdate) VALUES ('{$userid}','{$pid}',{$grand_total},now())";
$result = $mysqli -> query($sql);
if($result){
    echo "<script>
        alert('주문이 완료되었습니다.');
        location.href = '/pinkping/index.php';
    </script>";
}
if(isset($ucid) && $ucid !==''){
    
}