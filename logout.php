<?php

// session_start();
// session_unset();
// session_destroy();
// header("Location: ./");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logout'])) {

    require './components/_dbconn.php';

    session_start();
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM users WHERE email = :e";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':e' => $email,
    ));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        if ($row['loggedin'] == 1) {
            $id = $row['user_id'];
            $logout = "UPDATE users SET loggedin = :lo WHERE user_id = :u";
            $stmtl = $pdo->prepare($logout);
            $stmtl->execute(array(
                ':lo' => 0,
                ':u' => $row['user_id'],
            ));

            if ($stmtl) {
                session_start();
                setcookie('user', '', time() - 3600);
                session_unset();
                session_destroy();
                header("Location: ./");
            } else {
                $message = "Experiencing Issue " . mysqli_error($conn);
                $type = "danger";
            }
        } else {
            $message = "Already Logged Out";
            $type = "danger";
        }
    } else {
        $message = "No user exists with this email";
        $type = "danger";
    }
}

?>