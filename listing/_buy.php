<?php

session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = 0;
}
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'M') {
    header('Location: ../event.php');
}

require "../components/_dbconn.php";

if (isset($_POST['buyList'])) {

    $car_id = $_POST['buyList'];

    $sql = "SELECT * FROM cars, model, (SELECT car_id as req2, user_id as req3 FROM history, (SELECT MAX(transaction_id) as req FROM history WHERE mod(transaction_type,4)<>0 GROUP BY car_id) t1 WHERE history.transaction_id = t1.req AND transaction_type = 2 ) t2 WHERE model.model_id = cars.model_id AND t2.req2 = cars.car_id AND car_id = :c";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':c' => $car_id
    ));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($rows) {
        $sql = "SELECT * FROM cars WHERE car_id= :c";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':c' => $car_id,
        ));
        $cars = $stmt->fetch(PDO::FETCH_ASSOC);

        $sqluc = "SELECT * FROM users WHERE user_id = :u";
        $stmtuc = $pdo->prepare($sqluc);
        $stmtuc->execute(array(
            ':u' => $_SESSION['user'],
        ));
        $user = $stmtuc->fetch(PDO::FETCH_ASSOC);
        
        if ($user['amount'] - $cars['current_price'] >= 0) {
            // Update users table
            echo $amount = $user['amount'] - $cars['current_price'];
            echo $stars = $user['stars'] + $cars['current_stars'];

            $sqlu = "UPDATE users SET amount = :a, stars = :s WHERE user_id = :u";
            $stmtsu = $pdo->prepare($sqlu);
            $stmtsu->execute(array(
                ':u' => $_SESSION['user'],
                ':a' => $amount,
                ':s' => $stars
            ));

            // Update history table
            $sqlc = "SELECT * from cars, history where cars.car_id = history.car_id AND cars.car_id = :c";
            $stmtc = $pdo->prepare($sqlc);
            $stmtc->execute(array(
                ':c' => $car_id,
            ));
            $car = $stmtc->fetch(PDO::FETCH_ASSOC);

            $sqlh = "INSERT INTO history (car_id, user_id, transaction_type) VALUES (:c, :u, :t)";
            $stmth = $pdo->prepare($sqlh);
            $stmth->execute(array(
                ':c' => $car['car_id'],
                ':u' => $_SESSION['user'],
                ':t' => 3
            ));

            if($stmtsu && $stmth) {
                $_SESSION['msg'] = "You have successfully bought the car";
                $_SESSION['type'] = "success";
            } else {
                $_SESSION['msg'] = "Experiencing some issues.";
                $_SESSION['type'] = "danger";
            }

        } else {
            $_SESSION['msg'] = "You have insufficient balance";
            $_SESSION['type'] = "danger";
        }
    } else {
        $_SESSION['msg'] = "You missed. Already sold";
        $_SESSION['type'] = "danger";
    }
    header("Location: ../event.php");
} else {
    header("Location: ../");
}
