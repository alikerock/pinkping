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
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
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
          <select class="form-select" name="locate" id="locate" aria-label="위치지정">
            <option value="0">지정 안함</option>
            <option value="1">1번 위치</option>
            <option value="2">2번 위치</option>
          </select>
        </td>
      </tr>
      <tr>
        <th>상품 종료일</th>
        <td>
          <input type="text" name="sale_end_date" id="sale_end_date">
        </td>
      </tr>
      <tr>
        <th>상품 설명</th>
        <td>
          <textarea id="summernote" name="desc" class="w-100"></textarea>
        </td>
      </tr>
      <tr>
        <th>대표 이미지</th>
        <td>
          <input type="file" name="thumbnail" id="thumbnail">
        </td>
      </tr>
      <tr>
        <th>추가 이미지</th>
        <td>
          <input type="file" multiple name="upfile[]" id="upfile" class="d-none">
          <div>
            <button type="button" class="btn btn-secondary btn-sm" id="addImage">이미지 추가</button>
          </div>
          <div id="addedimages">

          </div>
        </td>
      </tr>
      <!--
        옵션
        컬러, 사이즈..
       -->
    </tbody>
  </table>
  <div class="text-end">
    <button class="btn btn-primary">상품 등록</button>
  </div>

</div>

<script src="/pinkping/admin/js/makeoption.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>
  $(document).ready(function() {

    $('#summernote').summernote({
      height: 300
    });

    $("#sale_end_date").datepicker();

    //추가 이미지 등록
    $('#addImage').click(function() {
      $('#upfile').trigger('click');
    });
    $('#upfile').change(function() {
      let files = $(this).prop('files');
      console.log(files);
      for (let i = 0; i < files.lenght; i++) {
        attachFile(files[i]);
      }
    });

    function attachFile(file) {
      var formData = new FormData();
      formData.append('savefile', file); //<input name="savefile" value="파일명">
    }

  });
</script>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/footer.php';
?>