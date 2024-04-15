<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/admin/inc/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/header.php';

$pid = $_GET['pid']; 
$sql = "SELECT * FROM products WHERE pid = {$pid}";
$result = $mysqli -> query($sql);
$rs = $result->fetch_object();

$imgSql = "SELECT * FROM product_image_table WHERE pid = {$pid}";
$imgrs = $mysqli -> query($imgSql);

while ($irs = $imgrs->fetch_object()) {
    $rsArr[] = $irs;
}



?>
<style>
    .thumbnail{text-align: center;}
    .thumbnail img{max-width: 400px;}
    .addedImage img{max-width: 200px;}
</style>

<div class="container">
    <h2><?= $rs->name; ?></h2> <!-- 제품명 -->
    <div class="thumbnail">
        <img src="<?= $rs->thumbnail; ?>" alt=""><!-- 대표이미지 -->
    </div>
    <div class="addedImage"> <!-- 추가이미지 -->
        <?php
            foreach($rsArr as $ra){
                ?>
                <img src="/pinkping/admin/upload/<?= $ra->filename; ?>" alt="">
                <?php
            }
        ?>
    </div>
    <div class="description"><!-- 상세설명 -->

    </div>
    <!-- 옵션 -->
</div>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/footer.php';
?>
