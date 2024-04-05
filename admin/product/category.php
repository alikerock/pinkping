<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/header.php';
$sql = "SELECT * FROM category where step = 1";
$result = $mysqli->query($sql);
while ($row = $result->fetch_object()) {
  $cate1[] = $row;
}

?>

<div class="container">
  <form action="">
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
  </form>
</div>
<script>
  $('#cate1').change(function() {
    makeOption($(this), 2, '중분류', $('#cate2'));
  });
  $('#cate2').change(function() {
    makeOption($(this), 3, '소분류', $('#cate3'));
  });
  $('#cate3').change(function() {

  });

  async function makeOption(e, step, category, target) {
    let cate = e.val();
    let data = new URLSearchParams({
      cate: cate,
      step: step,
      category: category
    });

    try {
      const response = await fetch('printOption.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: data
      });

      if (!response.ok) {
        throw new Error('Network response was not ok');
      }

      const resultText = await response.text();

      target.html(resultText);
    } catch (error) {
      console.error('Error:', error);
    }
  }

  /*
  function makeOption(e, step, category, target) {
    let cate = e.val();
    //console.log(cate);
    // 비동기 방식으로 printOption 값 3개(cate, step, category) 일시키고, 결과가 나오면 target에 html 태그를 생성
    let data = {
      cate: cate,
      step: step,
      category: category
    }
    console.log(data);
    $.ajax({
      async: false, // sucess의 결과가 나오면 작업 수행
      type: 'post',
      data: data,
      url: 'printOption.php',
      dataType: 'html',
      success: function(result) {
        console.log(result);
        target.html(result);
      }
    })
  }
  */
</script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/footer.php';
?>