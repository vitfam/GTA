<?php

session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = 0;
}
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'M') {
    header('Location: ../event.php');
}

require "../components/_dbconn.php";

if (isset($_POST['BUY'])) {

    $model_id = $_POST['BUY'];

    $sqls = "SELECT COUNT(car_id) AS stock FROM cars where model_id = :m GROUP BY model_id";
    $stmts = $pdo->prepare($sqls);
    $stmts->execute(array(
        ':m' => $model_id,
    ));
    $rows = $stmts->fetch(PDO::FETCH_ASSOC);

    if ($rows['stock'] < 1) {
        $sql = "SELECT * FROM model WHERE model_id= :m";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':m' => $model_id
        ));
        $model = $stmt->fetch(PDO::FETCH_ASSOC);

        $sqluc = "SELECT * FROM users WHERE user_id = :u";
        $stmtuc = $pdo->prepare($sqluc);
        $stmtuc->execute(array(
            ':u' => $_SESSION['user'],
        ));
        $user = $stmtuc->fetch(PDO::FETCH_ASSOC);

        $d_price = $model['price'] * 0.8; // 20% discount

        if ($user['amount'] - $d_price >= 0) {
            
            // Update users table
            $amount = $user['amount'] - $d_price;
            $stars = $user['stars'] + $model['stars'];

            $sqlu = "UPDATE users SET amount = :a, stars = :s WHERE user_id = :u";
            $stmtsu = $pdo->prepare($sqlu);
            $stmtsu->execute(array(
                ':u' => $_SESSION['user'],
                ':a' => $amount,
                ':s' => $stars
            ));

            // Update cars table
            $sqli = "INSERT INTO cars (model_id, current_price, current_stars) VALUES (:m, :p, :s)";
            $stmti = $pdo->prepare($sqli);
            $stmti->execute(array(
                ':m' => $model_id,
                ':p' => $d_price,
                ':s' => $model['stars']
            ));

            // Update history table
            $sqlc = "SELECT * FROM cars order by car_id DESC LIMIT 1";
            $stmtc = $pdo->prepare($sqlc);
            $stmtc->execute();
            $car = $stmtc->fetch(PDO::FETCH_ASSOC);

            $sqlh = "INSERT INTO history (car_id, user_id, transaction_type) VALUES (:c, :u, :t)";
            $stmth = $pdo->prepare($sqlh);
            $stmth->execute(array(
                ':c' => $car['car_id'],
                ':u' => $_SESSION['user'],
                ':t' => 5
            ));

            if($stmti && $stmtsu && $stmth) {
                $_SESSION['msg'] = "You cracked the deal.";
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
        $_SESSION['msg'] = "Out of stock";
        $_SESSION['type'] = "danger";
    }
    header("Location: ../event.php");
} else {
    header("Location: ../");
}
