<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/admin/inc/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/header.php';

?>

<div class="container">
    <h2></h2> <!-- 제품명 -->
    <div class="thumbnail">
        <img src="" alt=""><!-- 대표이미지 -->
    </div>
    <div class="addedImage"> <!-- 추가이미지 -->
        <!--
        <img src="" alt="">
        <img src="" alt="">
        <img src="" alt="">
        -->
    </div>
    <div class="description"><!-- 상세설명 -->

    </div>
    <!-- 옵션 -->
</div>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/footer.php';
?>
