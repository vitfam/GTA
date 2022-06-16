<?php
require "./components/_dbconn.php";

session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = 0;
}

if (isset($_SESSION['user']) && $_SESSION['user'] != 0) {
    header("Location: ./");
}

$message = "";
$type = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = :e";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':e' => $email,
    ));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        if ($password == $row['pass']) {
            if ($row['loggedin'] == 0) {
                $login = "UPDATE users SET loggedin = :li WHERE user_id = :u";
                $stmtl = $pdo->prepare($login);
                $stmtl->execute(array(
                    ':li' => 1,
                    ':u' => $row['user_id'],
                ));

                if ($stmtl) {
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
                    header( "refresh:2; url=./" );
                    $message = "Successfully Logged In";
                    $type = "success";
                } else {
                    $message = "Experiencing Issue " . mysqli_error($conn);
                    $type = "danger";
                }
            } else {
                $message = "Already Logged In";
                $type = "danger";
            }
        } else {
            $message = "No user exists with this email & password";
            $type = "danger";
        }
    } else {
        $message = "No user exists with this email & password";
        $type = "danger";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <?php require "./components/_header_links.php"; ?>
    <title>LOGIN | GTA 2.0</title>
</head>

<body style="background-image: linear-gradient(rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url('https://images.unsplash.com/photo-1535448580089-c7f9490c78b1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1321&q=80'); overflow: hidden;">
    <?php require "./components/_navbar.php"; ?>
    <?php $type ? require "./components/_alert.php" : "" ?>
    <div class="login-dark text-light">
        <form method="post" action="./login.php">
            <div class="illustration"><i class="fas fa-lock"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" /></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" /></div>
            <div class="form-group"><button class="btn btn-primary" type="submit">Log In</button></div>
        </form>
    </div>
    <script src="./js/main.js"></script>
</body>

</html>