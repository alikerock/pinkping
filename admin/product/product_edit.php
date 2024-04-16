<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/admin/inc/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/header.php';


$pid = $_GET['pid']; 
$sql = "SELECT * FROM products WHERE pid = {$pid}";
$result = $mysqli -> query($sql);
$rs = $result->fetch_object();

//카테고리 확인
$cates = $rs->cate; //A0001B0001C0001  str_split(문자열, 개수);
$cateArray = str_split($cates, 5);

foreach($cateArray as $cate){
  $sql = "SELECT * FROM category WHERE code = '{$cate}'";
  $result = $mysqli -> query($sql);
  while($caters = $result->fetch_object()){
    $cateArr[] = $caters;
  }
}


$imgSql = "SELECT * FROM product_image_table WHERE pid = {$pid}";
$imgrs = $mysqli -> query($imgSql);

while ($irs = $imgrs->fetch_object()) {
    $rsArr[] = $irs;
}

$optSql = "SELECT * FROM product_options WHERE pid = {$pid}";
$optrs = $mysqli -> query($optSql);

while ($ors = $optrs->fetch_object()) {
    $optArr[] = $ors;
}


?>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<style>
  .thumbnail {
    width: 300px;
  }
  .addedthumbs img, .opt_thumb{
    width: 100px;
  }


</style>
<div class="container">
  <h1>상품 수정</h1>
  <form action="product_edit_ok.php" method="POST" enctype="multipart/form-data" id="product_save">
    <input type="hidden" name="product_image" id="product_image_id">
    <input type="hidden" name="contents" id="contents">
    <input type="hidden" name="pid" value="<?= $pid; ?>">
    <input type="hidden" name="orgcate" value="<?= $cates; ?>">
    <table class="table">
      <tbody>
        <tr>
          <th>분류선택</th>
          <td>
            <div>
              <?php
                foreach($cateArr as $cate){
                  echo $cate-> name. '-';
                }
              ?>
            </div>
            <div class="category row">
              <div class="col">

                <select class="form-select" aria-label="대분류" id="cate1" name="cate1" required>
                  <option selected disabled>대분류</option>                 

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
          </td>
        </tr>
        <tr>
          <th>상품명</th>
          <td>
            <input type="text" name="name" id="name" placeholder="상품명" value="<?= $rs -> name?>" required>
          </td>
        </tr>
        <tr>
          <th>상품가격</th>
          <td>
            <input type="text" name="price" id="price" placeholder="상품가격" value="<?= $rs -> price?>" required>
          </td>
        </tr>
        <tr>
          <th>전시옵션</th>
          <td>
            <input class="form-check-input" type="checkbox" name="ismain" value="1" id="ismain" 
              <?php 
                if($rs->ismain){ echo "checked";} 
                ?>
            >

            <label class="form-check-label" for="ismain">
              메인
            </label>
            <input class="form-check-input" type="checkbox" name="isnew" value="1" id="isnew"
              <?php 
                if($rs->isnew){ echo "checked";} 
                ?>
            >
            <label class="form-check-label" for="isnew">
              신제품
            </label>
            <input class="form-check-input" type="checkbox" name="isbest" value="1" id="isbest"
              <?php 
                if($rs->isbest){ echo "checked";} 
              ?>
            >
            <label class="form-check-label" for="isbest">
              베스트
            </label>
            <input class="form-check-input" type="checkbox" name="isrecom" value="1" id="isrecom"
              <?php 
                if($rs->isrecom){ echo "checked";} 
              ?>
            >
            <label class="form-check-label" for="isrecom">
              추천
            </label>
          </td>
        </tr>
        <tr>
          <th>위치지정</th>
          <td>
            <select class="form-select" name="locate" id="locate" aria-label="위치지정">
              <option value="0" <?php if($rs->locate == 0){ echo "selected";}?>>지정 안함</option>
              <option value="1" <?php if($rs->locate == 1){ echo "selected";}?>>1번 위치</option>
              <option value="2" <?php if($rs->locate == 2){ echo "selected";}?>>2번 위치</option>
            </select>
          </td>
        </tr>
        <tr>
          <th>상품 종료일</th>
          <td>
            <input type="text" name="sale_end_date" id="sale_end_date" value="<?= $rs -> sale_end_date?>">
          </td>
        </tr>
        <tr>
          <th>상품 설명</th>
          <td>
            <textarea id="summernote" name="desc" class="w-100"><?= $rs -> content?></textarea>
          </td>
        </tr>
        <tr>
          <th>대표 이미지</th>
          <td>
            <img src="<?= $rs -> thumbnail?>" alt="" class="thumbnail">
            <input type="file" name="thumbnail" id="thumbnail" accept="image/*" required>
          </td>
        </tr>
        <tr>
          <th>추가 이미지</th>
          <td>
            <input type="file" multiple name="upfile[]" id="upfile" class="d-none">
            <div>
              <button type="button" class="btn btn-secondary btn-sm" id="addImage">이미지 추가</button>
            </div>
            <div class="addedthumbs">
            <?php
            if(isset($rsArr)){            
                foreach($rsArr as $ra){
                    ?>
                    <img src="/pinkping/admin/upload/<?= $ra->filename; ?>" alt="">
                    <?php
                }
            }
            ?>
            </div>
            <div id="addedimages" class="d-flex gap-3 p-3">

              <!--    
              <div class="card" style="width: 10rem;" id="f_01">
                <img src="..." class="img-fluid" alt="...">
                <button type="button" class="btn btn-danger btn-sm">삭제</button>
              </div>
              -->

            </div>
          </td>
        </tr>
        <!-- 옵션 컬러, 사이즈.. -->
        <tr>
          <th>
            <label for="optionCate1">옵션 선택</label>

            <?php
            if(isset($optArr)){
              $optionName = $optArr[0]->cate;
            }
            ?>
              
            <select name="optionCate1" id="optionCate1">              
              <option value="컬러" <?php if($optionName == '컬러'){ echo 'selected';} ?>>컬러</option>
              <option value="사이즈" <?php if($optionName == '사이즈'){ echo 'selected';} ?>>사이즈</option>
            </select>
          </th>
          <td>
            <table class="table">
              <thead>
                <tr>
                  <th>옵션명</th>
                  <th>재고</th>
                  <th>가격</th>
                  <th>이미지</th>
                </tr>
              </thead>
              <tbody id="option1">
              <?php
                  if(isset($optArr)){
                      foreach($optArr as $oa){
                      ?>
                          <tr id="optionTr1">
                            <td>
                              <input type="text" class="form-control" name="optionName1[]" value="<?= $oa -> option_name; ?>">
                            </td>
                            <td>
                              <input type="text" class="form-control" name="optionCnt1[]" value="<?= $oa -> option_cnt; ?>">
                            </td>
                            <td class="d-flex">
                              <input type="text" class="form-control" name="optionPrice1[]" value="<?= $oa -> option_price; ?>">
                              <span>원</span>
                            </td>
                            <td>
                              <input type="file"  name="optionImage1[]" value="<?= $oa -> image_url; ?>">
                              <img src="<?= $oa -> image_url; ?>" alt="" class="opt_thumb">
                            </td>
                          </tr>
                      <?php
                      }
                  }
              ?>
              </tbody>
            </table>
            <button type="button" class="btn btn-secondary optAddBtn">옵션 추가</button>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="text-end">
      <button class="btn btn-primary">상품 등록</button>
    </div>
  </form>
</div>

<script src="/pinkping/admin/js/makeoption.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>
  $(document).ready(function() {

    $('.optAddBtn').click(function(){
      let addHtml = $('#optionTr1').html();
          addHtml =  `<tr>${addHtml}</tr>`;
      $('#option1').append(addHtml);
    });

    $('#product_save').on('submit', save);

    function save() {
      let markupStr = $('#summernote').summernote('code');
      let contents = encodeURIComponent(markupStr);
      $('#contents').val(contents);
    }

    $('#summernote').summernote({
      height: 300
    });

    $("#sale_end_date").datepicker({
      dateFormat: "yy-mm-dd"
    });

    //추가 이미지 등록
    $('#addImage').click(function() {
      $('#upfile').trigger('click');
    });
    $('#upfile').change(function() {
      let files = $(this).prop('files');
      console.log(files);
      for (let i = 0; i < files.length; i++) {
        attachFile(files[i]);
      }
      $('#upfile').val('');
    });

    function attachFile(file) {
      var formData = new FormData();
      formData.append('savefile', file); //<input name="savefile" value="파일명">

      $.ajax({
        url: 'product_save_image.php',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        type: 'POST',
        success: function(return_data) {
          console.log(return_data);
          if (return_data.result == 'size') {
            alert('10메가 이하만 첨부할수 있습니다.');
            return; //함수 종료(빈값을 리턴);
          } else if (return_data.result == 'image') {
            alert('이미지만 첨부할 수 있습니다.');
            return;
          } else if (return_data.result == 'error') {
            alert('파일 첨부 실패, 관리자에게 문의하세요');
            return;
          } else {
            let imgid = $('#product_image_id').val() + return_data.imgid + ',';
            $('#product_image_id').val(imgid);
            let html = `
                <div class="card" style="width: 10rem;" id="${return_data.imgid}">
                  <img src="/pinkping/admin/upload/${return_data.savefile}" class="img-fluid" alt="...">
                  <button type="button" class="btn btn-danger btn-sm">삭제</button>
                </div>
              `;

            $('#addedimages').append(html);
          }
        }
      });
    }

    $('#addedimages').on('click', 'button', function() {
      let imgid = $(this).parent().attr('id');
      file_delete(imgid);
    });

    function file_delete(imgid) {
      if (!confirm('정말 삭제할까요?')) {
        return false;
      }
      let data = {
        imgid: imgid
      }
      $.ajax({
        async: false, //결과가 있으면 반영해줘
        type: 'POST',
        url: 'image_delete.php',
        data: data,
        dataType: 'json',
        error: function(error) {
          console.log('error:', error);
        },
        success: function(return_data) {
          if (return_data.result === 'member') {
            alert('권한이 없습니다.');
            return;
          } else if (return_data.result === 'mine') {
            alert('본인이 등록한 이미지만 삭제할 수 있습니다.');
            return;
          } else if (return_data.result === 'fail') {
            alert('삭제 실패!');
            return;
          } else {
            $('#' + imgid).remove();
          }
        }
      });
    }

  });
</script>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/footer.php';
?>