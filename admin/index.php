<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/admin/inc/admin_check.php';

$sql = "SELECT name FROM category";
$result = $mysqli -> query($sql);
while($row = $result->fetch_object()){
    $cateArr[] = $row;
}

$cateNames = [];
foreach($cateArr as $item){
    array_push($cateNames, $item->name);
}
//print_r($cateNames);
//echo json_encode($cateNames) ;

?>
<style>
    #myChart{
        width: 500px;
        height: 400px;
    }
</style>

<div class="container">
    <h1>대쉬보드</h1>
    <div>
        <?php echo '반갑습니다.'.$_SESSION['AUNAME'].'님' ; ?>
        <a href="logout.php">logout</a>
    </div>
    <div>
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    const ctx = document.getElementById('myChart');
    const cateLabels = <?= json_encode($cateNames) ?>;

    new Chart(ctx, {
        type: 'bar',
        data: {
        labels: cateLabels,
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            borderWidth: 1
        }]
        },
        options: {
        scales: {
            y: {
            beginAtZero: true
            }
        }
        }
    });
    </script>
</div>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/footer.php';
?>