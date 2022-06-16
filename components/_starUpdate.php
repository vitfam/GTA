<?php
    $sql = "SELECT * FROM cars, model, (SELECT history.car_id FROM history, (SELECT MAX(transaction_id) AS required_id FROM history WHERE user_id = :u and mod(transaction_type,4) <> 0 GROUP BY car_id) t1 WHERE t1.required_id = history.transaction_id AND transaction_type IN (1, 3, 5, 7)) t2 WHERE cars.car_id = t2.car_id AND model.model_id = cars.model_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':u' => $_SESSION['user']
    ));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $starUpdate = 0;
    foreach($rows as $r){
        $starUpdate = $starUpdate + $r['current_stars'];
    }
    if($starUpdate <= 0){
        $starUpdate = 0;
    }

    $starup = "UPDATE users SET stars = :s WHERE user_id = :u";
    $stmtup = $pdo->prepare($starup);
    $stmtup->execute(array(
        ':s' => $starUpdate,
        ':u' => $_SESSION['user']
    ));
?>