<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/header.php';

$sql = "SELECT * FROM category where step = 1";
$result = $mysqli->query($sql);
while ($row = $result->fetch_object()) {
  $cate1[] = $row;
}
?>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


<div class="container">
  <h1>상품 등록</h1>
  <table class="table">
    <tbody>
      <tr>
        <th>분류선택</th>
        <td>
          <div class="category row">
            <div class="col">

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
            <div class="col">

              <select class="form-select" aria-label="중분류" id="cate2">

              </select>
            </div>
            <div class="col">

              <select class="form-select" aria-label="소분류" id="cate3">

              </select>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <th>상품명</th>
        <td>
          <input type="text" name="name" id="name" placeholder="상품명">
        </td>
      </tr>
      <tr>
        <th>상품가격</th>
        <td>
          <input type="text" name="price" id="price" placeholder="상품가격">
        </td>
      </tr>
      <tr>
        <th>전시옵션</th>
        <td>
          <input class="form-check-input" type="checkbox" name="ismain" value="1" id="ismain">
          <label class="form-check-label" for="ismain">
            메인
          </label>
          <input class="form-check-input" type="checkbox" name="isnew" value="1" id="isnew">
          <label class="form-check-label" for="isnew">
            신제품
          </label>
          <input class="form-check-input" type="checkbox" name="isbest" value="1" id="isbest">
          <label class="form-check-label" for="isbest">
            베스트
          </label>
          <input class="form-check-input" type="checkbox" name="isrecom" value="1" id="isrecom">
          <label class="form-check-label" for="isrecom">
            추천
          </label>
        </td>
      </tr>
      <tr>
        <th>위치지정</th>
        <td>
          <input type="text" name="price" id="price" placeholder="상품가격">
        </td>
      </tr>
      <tr>
        <th>상품 설명</th>
        <td>
          <textarea id="summernote" name="desc" class="w-100"></textarea>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="text-end">
    <button class="btn btn-primary">상품 등록</button>
  </div>

</div>

<script src="/pinkping/admin/js/makeoption.js"></script>

<script>
  $(document).ready(function() {
    $('#summernote').summernote({
      height: 300
    });
  });
</script>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/footer.php';
?>