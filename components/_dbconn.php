<?php
$server = "localhost";
$user = "root";
$password = "ritik";
$db = "vitfam-gta";

$pdo = new PDO("mysql:host=$server;dbname=$db", $user, $password);

if (isset($_COOKIE['user'])) {
    $user_id = $_COOKIE['user'];
    $sql = "SELECT * FROM users WHERE user_id = :u";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':u' => $user_id,
    ));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        if ($row['loggedin'] == 1) {
            session_start();
            if($row['user_type'] == 'M'){
                $_SESSION['user_type'] = 'M';
                $_SESSION['user'] = $row['link'];
            } else {
                $_SESSION['user_type'] = 'L';
                $_SESSION['user'] = $row['user_id'];
            }
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            setcookie("user", $row['user_id'], time() + (86400 * 7));
        } else {
            $_SESSION['user'] = 0;
        }
    } else {
        $_SESSION['user'] = 0;
    }
}