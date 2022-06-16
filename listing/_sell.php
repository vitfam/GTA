<?php

session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = 0;
}
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'M') {
    header('Location: ../event.php');
}
require "../components/_dbconn.php";

if (isset($_POST['LIST'])) {

    $user_price = $_POST['user_price'];

    $car_id = $_POST['LIST'];

    $sqlc = "SELECT * FROM cars WHERE car_id= :s";
    $stmtc = $pdo->prepare($sqlc);
    $stmtc->execute(array(
        ':s' => $car_id,
    ));
    $car = $stmtc->fetch(PDO::FETCH_ASSOC);

    if ($user_price > 0 && $car['current_stars'] > 0) {
        
        $sqlu = "SELECT * FROM users WHERE user_id= :u";
        $stmtu = $pdo->prepare($sqlu);
        $stmtu->execute(array(
            ':u' => $_SESSION['user']
        ));
        $user = $stmtu->fetch(PDO::FETCH_ASSOC);

        $actual_price = $car['current_price'];

        if (($actual_price * 1.2) >= $user_price) {
            $amount = $user['amount'] + $user_price;

            $sqluu = "UPDATE users SET amount = :a, stars = stars - :s WHERE user_id = :u";
            $stmtuu = $pdo->prepare($sqluu);
            $stmtuu->execute(array(
                ':u' => $_SESSION['user'],
                ':a' => $amount,
                ':s' => $car['current_stars']
            ));

            $sqluc = "UPDATE cars SET current_price = :a WHERE car_id = :c";
            $stmtuc = $pdo->prepare($sqluc);
            $stmtuc->execute(array(
                ':c' => $car_id,
                ':a' => $user_price
            ));

            $sqluh = "INSERT INTO history (user_id, car_id, transaction_type) VALUES (:u, :c, :t)";
            $stmtuh = $pdo->prepare($sqluh);
            $stmtuh->execute(array(
                ':u' => $_SESSION['user'],
                ':c' => $car_id,
                ':t' => "2"
            ));

            if ($stmtuc && $stmtuh && $stmtuu) {
                $_SESSION['msg'] = "You have successfully listed the car";
                $_SESSION['type'] = "success";
            } else {
                $_SESSION['msg'] = "Something went wrong";
                $_SESSION['type'] = "danger";
            }
        } else {
            $_SESSION['msg'] = "You cannot list a car with more than 20% of the actual price";
            $_SESSION['type'] = "danger";
        }
    } else {
        $_SESSION['msg'] = "You cannot list a car with this value";
        $_SESSION['type'] = "danger";
    }

    header("Location: ../event.php");
}
