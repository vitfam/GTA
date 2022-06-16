<h2 class="text-center text-info mb-5">LISTED CARS</h2>
<?php
$sql = "SELECT * FROM cars, model, (SELECT car_id as req2, user_id as req3 FROM history, (SELECT MAX(transaction_id) as req FROM history WHERE mod(transaction_type,4)<>0 GROUP BY car_id) t1 WHERE history.transaction_id = t1.req AND transaction_type = 2 ) t2 WHERE model.model_id = cars.model_id AND t2.req2 = cars.car_id";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<div class="cars-list">';
foreach ($rows as $row) {
    $row['image'] = str_replace("https://drive.google.com/file/d/", "", $row['image']);
    $row['image'] = str_replace("/view?usp=sharing", "", $row['image']);
    echo '
                <div class="car">
                    <div class="car-image">
                        <img src="https://drive.google.com/uc?id=' . $row['image'] . '" alt="' . $row['model_name'] . '">
                    </div>
                    <div class="car-desc">
                        <h3>' . $row['model_name'] . '</h3>
                        <p class="text-warning">' . $row['type'] . '</p>
                        <div class="descp">
                            <div>
                                <span>MILEAGE : <b class="text-info"> ' . $row['mileage'] . ' KM/L</b></span> 
                                <span>ENGINE : <b class="text-info">' . $row['engine'] . ' CC</b></span>
                            </div>
                            <div>
                                <span>POWER : <b class="text-info"> ' . $row['power'] . ' BHP</b></span> 
                                <span>TORQUE : <b class="text-info">' . $row['torque'] . ' NM</b></span>
                            </div>
                            <div>
                                <span>STARS : <b class="text-info"> ' . $row['current_stars'] . ' <i class="fas fa-star text-warning"></i></b></span> 
                                <span>PRICE : <b class="text-info">₹ ' . $row['current_price'] . '</b></span>
                            </div>
                        </div>
                    </div>
            ';
    if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'L') {
        echo '<button type="button" class="btn u-btn btn-buy mb-4" data-bs-toggle="modal" data-bs-target="#buyList' . $row['car_id'] . '">BUY CAR</button>';
        require "./listing/_buyModal.php";
    }
    echo '</div>';
}
echo '</div>';
?>