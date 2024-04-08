<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/header.php';

$sql = "SELECT * FROM category where step = 1";
$result = $mysqli->query($sql);
while ($row = $result->fetch_object()) {
  $cate1[] = $row;
}
?>
<div class="container">
  <h1>상품 등록</h1>
  <div class="category row">
    <div class="col-md-4">

      <select class="form-select" aria-label="대분류" id="cate1">
        <option selected>대분류</option>
        <?php
        foreach ($cate1 as $c1) {
        ?>

          <option value="<?= $c1->code; ?>"><?= $c1->name; ?></option>

        <?php
        }
        ?>

      </select>
    </div>
    <div class="col-md-4">

      <select class="form-select" aria-label="중분류" id="cate2">

      </select>
    </div>
    <div class="col-md-4">

      <select class="form-select" aria-label="소분류" id="cate3">

      </select>
    </div>
  </div>
</div>

<script src="/pinkping/admin/js/makeoption.js"></script>