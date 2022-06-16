<?php
require "./components/_dbconn.php";
session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = 0;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>GTA 2.O | VITFAM</title>
    <?php require "./components/_header_links.php"; ?>
</head>

<body style="background-image: linear-gradient(rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url('https://images.unsplash.com/photo-1597007066704-67bf2068d5b2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80'); overflow: hidden;">
    <?php require "./components/_navbar.php"; ?>
    <div class="main-container d-flex justify-content-center align-items-center text-light text-center">
        <div class="container d-flex justify-content-center align-items-center flex-column text-uppercase">
            <h1>WELCOME TO GTA 2.0</h1>
            <h4>grand thrift auto</h4>
            <?php echo ($_SESSION['user'] != 0) ? '<h2 class="text-uppercase display-name">Hello <span>' . $_SESSION['name'] . '</span></h2>' : ""; ?>
            <?php require "./components/_countdown.php" ?>
        </div>
    </div>
    <script src="./js/main.js"></script>
</body>

</html>