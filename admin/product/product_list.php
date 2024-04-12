<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/admin/inc/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/header.php';

$sql = "SELECT * FROM category where step = 1";
$result = $mysqli->query($sql);
while ($row = $result->fetch_object()) {
  $cate1[] = $row;
}
?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

<div class="container">
  <h1>상품 목록</h1>
  <form action="" id="search_form">
    <div class="category row">
      <div class="col">

        <select class="form-select" aria-label="대분류" id="cate1" name="cate1" required>
          <option selected disabled>대분류</option>
          <?php
          foreach ($cate1 as $c1) {
          ?>

            <option value="<?= $c1->code; ?>"><?= $c1->name; ?></option>

          <?php
          }
          ?>

        </select>
      </div>
      <div class="col">

        <select class="form-select" aria-label="중분류" id="cate2" name="cate2">

        </select>
      </div>
      <div class="col">

        <select class="form-select" aria-label="소분류" id="cate3" name="cate3">

        </select>
      </div>
    </div>
    <div class="d-flex gap-3 mt-3 justify-content-between align-items-center">
      <div class="group">
        <input class="form-check-input" type="checkbox" value="1" id="ismain" name="ismain">
        <label class="form-check-label" for="ismain">메인</label>

        <input class="form-check-input" type="checkbox" value="1" id="isnew" name="isnew">
        <label class="form-check-label" for="isnew">신제품</label>

        <input class="form-check-input" type="checkbox" value="1" id="isbest" name="isbest">
        <label class="form-check-label" for="isbest">베스트</label>

        <input class="form-check-input" type="checkbox" value="1" id="isreom" name="isreom">
        <label class="form-check-label" for="isreom">추천</label>
      </div>
      <div class="group d-flex align-items-center">
        <label class="form-label text-nowrap" for="end_date">판매종료일</label>
        <input class="form-control" type="text" id="end_date" name="sale_end_date">
      </div>
      <div class="group d-flex align-items-center">
        <input class="form-control" type="text" id="search_keyword" name="search_keyword" placeholder="상품명 또는 내용 입력">
        <button class="btn btn-primary text-nowrap">검색</button>
      </div>
    </div>
  </form>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table>
  <a href="product_up.php" class="btn btn-primary">상품 등록</a>
</div>

<script src="/pinkping/admin/js/makeoption.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
  $("#end_date").datepicker({
    dateFormat: "yy-mm-dd"
  });
</script>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/footer.php';
?>