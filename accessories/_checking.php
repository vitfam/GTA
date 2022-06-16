<?php

$sq = "SELECT exists(Select transaction_type from history WHERE mod(transaction_type,4)=0 and user_id = :u and car_id = :c) AS bought";
$stmtq = $pdo->prepare($sq);
$stmtq->execute(array(
    ':c' => $row['car_id'],
    ':u' => $_SESSION['user']
));
$rowq = $stmtq->fetch(PDO::FETCH_ASSOC);

$sqlc = "SELECT * FROM cars, model, (SELECT history.car_id FROM history, (SELECT MAX(transaction_id) AS required_id FROM history WHERE user_id = :u AND mod(transaction_type,4) <> 0 GROUP BY car_id) t1 WHERE t1.required_id = history.transaction_id AND transaction_type IN (1, 3)) t2 WHERE cars.car_id = t2.car_id AND model.model_id = cars.model_id";
$stmtc = $pdo->prepare($sqlc);
$stmtc->execute(array(
    ':u' => $_SESSION['user'],
));
$cars = $stmtc->rowCount();

if ($cars) {
    if ($rowq['bought'] == 1) {
        echo '<p class="btn u-btn disabled btn-warning mb-4">MODIFIED</p>';
    } else {
        echo '<button type="button" class="btn u-btn btn-buy mb-4" data-bs-toggle="modal" data-bs-target="#chooseCar' . $row['car_id'] . '">MODIFY NOW</button>';
        require "./accessories/_chooseModal.php";
    }
} else {
    echo '<p class="btn u-btn disabled btn-secondary mb-4">NO CAR</p>';
}
