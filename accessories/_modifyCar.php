<?php

session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = 0;
}
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'M') {
    header('Location: ../event.php');
}

require "../components/_dbconn.php";

if (isset($_POST['modify'])) {

    $accessory_id = $_POST['accessory_id'];
    $car_id = $_POST['modify'];

    $sqls = "SELECT * FROM accessories WHERE accessory_id = :a";
    $stmts = $pdo->prepare($sqls);
    $stmts->execute(array(
        ':a' => $accessory_id,
    ));
    $acc = $stmts->fetch(PDO::FETCH_ASSOC);

    if ($acc['accessory_stock'] != 0) {
        $sqluc = "SELECT * FROM users WHERE user_id = :u";
        $stmtuc = $pdo->prepare($sqluc);
        $stmtuc->execute(array(
            ':u' => $_SESSION['user'],
        ));
        $user = $stmtuc->fetch(PDO::FETCH_ASSOC);

        $sqlcar = "SELECT * FROM cars WHERE car_id = :c";
        $stmtcar = $pdo->prepare($sqlcar);
        $stmtcar->execute(array(
            ':c' => $car_id,
        ));
        $car_d = $stmtcar->fetch(PDO::FETCH_ASSOC);

        if ($user['amount'] - $acc['accessory_price'] >= 0) {
            if ($car_d['current_stars'] + $acc['accessory_stars'] <= 10) {

                // Update users table
                $amount = $user['amount'] - $acc['accessory_price'];
                $stars = $user['stars'] + $acc['accessory_stars'];

                $sqlu = "UPDATE users SET amount = :a, stars = :s WHERE user_id = :u";
                $stmtsu = $pdo->prepare($sqlu);
                $stmtsu->execute(array(
                    ':u' => $_SESSION['user'],
                    ':a' => $amount,
                    ':s' => $stars
                ));

                // Update accessories table
                $stock = $acc['accessory_stock'] - 1;
                $sqla = "UPDATE accessories SET accessory_stock = :s WHERE accessory_id = :a";
                $stmtsa = $pdo->prepare($sqla);
                $stmtsa->execute(array(
                    ':a' => $accessory_id,
                    ':s' => $stock
                ));

                // Update cars table
                $sqlc = "UPDATE cars SET current_stars = current_stars + :s WHERE car_id = :c";
                $stmtc = $pdo->prepare($sqlc);
                $stmtc->execute(array(
                    ':s' => $acc['accessory_stars'],
                    ':c' => $car_id
                ));

                // Update history table
                $sqlh = "INSERT INTO history (car_id, user_id, transaction_type) VALUES (:c, :u, :t)";
                $stmth = $pdo->prepare($sqlh);
                $stmth->execute(array(
                    ':c' => $car_id,
                    ':u' => $_SESSION['user'],
                    ':t' => $accessory_id
                ));

                if ($stmtc && $stmtsu && $stmth && $sqla) {
                    $_SESSION['msg'] = "You have successfully modified the car";
                    $_SESSION['type'] = "success";
                } else {
                    $_SESSION['msg'] = "Experiencing some issues.";
                    $_SESSION['type'] = "danger";
                }
            } else {
                $_SESSION['msg'] = "Maximum modification reached";
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
