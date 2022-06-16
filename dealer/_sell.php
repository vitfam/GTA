<?php

session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = 0;
}
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'M') {
    header('Location: ../event.php');
}

require "../components/_dbconn.php";

if (isset($_POST['SELL'])) {

    $car_id = $_GET['x'];

    $sqlc = "SELECT * FROM cars WHERE car_id= :s";
    $stmtc = $pdo->prepare($sqlc);
    $stmtc->execute(array(
        ':s' => $car_id,
    ));
    $car = $stmtc->fetch(PDO::FETCH_ASSOC);

    $sqlu = "SELECT * FROM users WHERE user_id= :u";
    $stmtu = $pdo->prepare($sqlu);
    $stmtu->execute(array(
        ':u' => $_SESSION['user']
    ));
    $user = $stmtu->fetch(PDO::FETCH_ASSOC);

    // depreciation
    $cur_price = $car['current_price'] - ($car['current_price'] * 0.1);
    $cur_stars = $car['current_stars'] - 0.5;

    $amount = $user['amount'] + $cur_price;
    $stars = $user['stars'] - $car['current_stars'];

    $sqluu = "UPDATE users SET amount = :a, stars = :s WHERE user_id = :u";
    $stmtuu = $pdo->prepare($sqluu);
    $stmtuu->execute(array(
        ':u' => $_SESSION['user'],
        ':a' => $amount,
        ':s' => $stars
    ));

    $sqluc = "UPDATE cars SET current_price = :a, current_stars = :s WHERE car_id = :c";
    $stmtuc = $pdo->prepare($sqluc);
    $stmtuc->execute(array(
        ':c' => $car_id,
        ':a' => $cur_price,
        ':s' => $cur_stars
    ));

    $sqluh = "INSERT INTO history (user_id, car_id, transaction_type) VALUES (:u, :c, :t)";
    $stmtuh = $pdo->prepare($sqluh);
    $stmtuh->execute(array(
        ':u' => $_SESSION['user'],
        ':c' => $car_id,
        ':t' => "6"
    ));

    if ($stmtuc && $stmtuh && $stmtuu) {
        $_SESSION['msg'] = "You have successfully sold the car";
        $_SESSION['type'] = "success";
    } else {
        $_SESSION['msg'] = "Something went wrong";
        $_SESSION['type'] = "danger";
    }

    header("Location: ../event.php");
}
