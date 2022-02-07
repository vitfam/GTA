<?php

require "./components/_dbconn.php";
$sql = "SELECT * FROM car_type";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$rows = $stmt->fetchAll();

if ($rows[0]['round_check'] == $r && $rows[1]['round_check'] == $r && $rows[2]['round_check'] == $r && $rows[3]['round_check'] == $r && $rows[4]['round_check'] == $r) {
    $dep = "UPDATE cars INNER JOIN (SELECT cars.current_price, cars.current_stars, cars.car_id, model.model_name, model.type, cars.current_price-(car_type.depreciation*0.01*model.price) as reducedp, cars.current_stars-(car_type.depreciation*0.01*model.stars) as reduceds from cars, model, car_type, (select history.car_id from history, (select max(transaction_id) as last_transaction, car_id from history where mod(transaction_type,4)<>0 group by car_id) t1 where history.transaction_id = t1.last_transaction AND transaction_type in (1,3,7)) t2 WHERE t2.car_id = cars.car_id AND cars.model_id = model.model_id AND model.type = car_type.type) b2 ON cars.car_id = b2.car_id SET cars.current_price = b2.reducedp, cars.current_stars = b2.reduceds";
    $stmt = $pdo->prepare($dep);
    $stmt->execute();

    foreach ($rows as $car_type) {
        if ($car_type['round_check'] == $r) {

            $sql = "UPDATE car_type SET round_check = round_check + 1, depreciation = depreciation + 2";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $r = 0;
        }
    }
}

?>