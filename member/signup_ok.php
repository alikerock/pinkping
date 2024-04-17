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
    echo "<script>
        alert('회원가입 완료');
        location.href='/pinkping/index.php';
    </script>";
}
?>