<div class="container list-selling d-flex justify-content-between my-5 py-5">
    <!-- list of the cars in inventory -->
    <div class="sell" style="width: 100%; border-right: 1px dotted #FFF;">
        <?php
        $sql = "SELECT * FROM cars, model, (SELECT history.car_id FROM history, (SELECT MAX(transaction_id) AS required_id FROM history WHERE user_id = :u and mod(transaction_type,4) <> 0 GROUP BY car_id) t1 WHERE t1.required_id = history.transaction_id AND transaction_type IN (1, 3)) t2 WHERE cars.car_id = t2.car_id AND model.model_id = cars.model_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':u' => $_SESSION['user']
        ));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo $rows ? '<h2 class="text-center text-info mb-5">YOUR CARS</h2>' : "<h2 class='text-center text-uppercase text-warning'>You don't have any car</h2>";

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
                echo '<button type="button" class="btn u-btn btn-sell mb-4" data-bs-toggle="modal" data-bs-target="#listNow' . $row['car_id'] . '">LIST YOUR CAR</button>';
                require "./listing/_sellModal.php";
            }
            echo '</div>';
        }
        echo '</div>';
        ?>
    </div>
    <!-- List of the listed cars for buying -->
    <div class="buy" style="width: 100%;">
        <?php require "./listing/buying.php"; ?>
    </div>
</div>