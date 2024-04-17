<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/dbcon.php';

$username = $_POST['username'];
$userid = $_POST['userid'];
$email = $_POST['email'];
$passwd = $_POST['passwd'];
$passwd = hash('sha512',$passwd);

$sql = "INSERT INTO members (username, userid, email, passwd, regdate) VALUES ('{$username}', '{$userid}','{$email}','{$passwd}',now())";
$result = $mysqli -> query($sql);
if($result){
    //회원가입 축하 쿠폰 발행
    $csql = "SELECT * FROM coupons WHERE cid=1";//축하 쿠폰 조회
    $cresult = $mysqli -> query($csql);
    $crs =  $cresult->fetch_object();

    $due_date = date("Y-m-d 23:59:59", strtotime("+30 days"));

    $ucSql = "INSERT INTO user_coupons (couponid,userid,status,use_max_date,regdate,reason) VALUES (
        '{$crs->cid}',
        '{$userid}',
        1,
        '{$due_date}',
        now(),
        '회원가입'
    )";
    $ucResult = $mysqli -> query($ucSql);
    $couponName = $crs->coupon_name;

    echo "<script>
        alert('회원가입 완료!, $couponName 쿠폰이 발행되었습니다.');
        location.href='/pinkping/index.php';
    </script>";
}
?>