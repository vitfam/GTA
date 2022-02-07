<?php
require "./components/_dbconn.php";
session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = 0;
}
if (isset($_SESSION['user']) && $_SESSION['user'] == 0) {
    header("Location: ./");
}
?>
<!DOCTYPE html>
<html>

<head>
    <?php require "./components/_header_links.php" ?>
    <title>MY ACCOUNT | GTA 2.0</title>
</head>

<body>
    <?php require "./components/_navbar.php";

    echo '<h1 class="mt-3 text-center text-uppercase">Hello <span class="text-info">' . $_SESSION['name'] . '</span></h1>';
    echo '<hr/>';
    $sqlu = "SELECT * FROM users WHERE user_id = :u";
    $stmtu = $pdo->prepare($sqlu);
    $stmtu->execute(array(
        ':u' => $_SESSION['user'],
    ));
    $user = $stmtu->fetch(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM cars, model, (SELECT history.car_id FROM history, (SELECT MAX(transaction_id) AS required_id FROM history WHERE user_id = :u and mod(transaction_type,4) <> 0 GROUP BY car_id) t1 WHERE t1.required_id = history.transaction_id AND transaction_type IN (1, 3, 5, 7)) t2 WHERE cars.car_id = t2.car_id AND model.model_id = cars.model_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':u' => $_SESSION['user']
    ));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $total_cars = $stmt->rowCount();

    if ($user) {
        require "./components/_starUpdate.php";
        $STARS = $user['stars'] == NULL ? "0" : $user['stars'];
        echo '
            <div class="container star-amount my-5">
                <div class="left">
                    <h3 class="mb-3">Total Stars</h3>
                    <p>' . $STARS . ' <i class="fa fa-star text-warning"></i></p>
                </div>
                <div class="mid">
                    <h3 class="mb-3">Total Cars</h3>
                    <p>' . $total_cars . ' <i class="fa fa-car text-success"></i></p>
                </div>
                <div class="right">
                    <h3 class="mb-3">Balance Left</h3>
                    <p><span class="text-info">₹</span> ' . $user['amount'] . '</p>
                </div>
            </div>
        ';
    }
    ?>
    <hr>
    <div class="container my-5">
        <?php
        echo $rows ? '<h2 class="text-center mb-5">LIST OF YOUR CARS</h2>' : "<h4 class='text-center text-uppercase text-warning'>You currently don't have any car</h4>";
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
                    </div>
                ';
        }
        ?>
    </div>
    </div>
    <?php $rows ? require "./components/_footer.php" : ""; ?>
    <script src="./js/main.js"></script>
</body>

</html>