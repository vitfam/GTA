<?php
$sqls = "SELECT COUNT(car_id) AS stock, car_id FROM cars where model_id = :m GROUP BY model_id";
$stmts = $pdo->prepare($sqls);
$stmts->execute(array(
    ':m' => $row['model_id'],
));
$rows = $stmts->fetch(PDO::FETCH_ASSOC);

if ($rows['stock'] < 1) {
    
    $sq = "SELECT * FROM history WHERE car_id = :c AND user_id = :u ORDER BY transaction_id DESC LIMIT 1";
    $stmtq = $pdo->prepare($sq);
    $stmtq->execute(array(
        ':c' => $rows['car_id'],
        ':u' => $_SESSION['user']
    ));
    $rowq = $stmtq->fetch(PDO::FETCH_ASSOC);

    if ($rowq['transaction_type'] == 5) {
        echo '<p class="btn u-btn disabled btn-warning mb-4">BOUGHT</p>';
    } else {
        echo '<button type="button" class="btn u-btn btn-buy mb-4" data-bs-toggle="modal" data-bs-target="#buyNow' . $row['model_id'] . '">BUY NOW</button>';
        require "./sale/_saleModal.php";
    }
} else {
    echo '<p class="btn u-btn disabled btn-sell mb-4">OUT OF STOCK</p>';
}

?>