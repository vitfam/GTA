<?php
require "./components/_dbconn.php";
session_start();
if (isset($_SESSION['user']) && $_SESSION['user'] == 0) {
    header("Location: ./");
}
require "./components/_event_time.php";

$message = "";
$type = "";

if (isset($_SESSION['msg']) && isset($_SESSION['type'])) {
    $message = $_SESSION['msg'];
    $type = $_SESSION['type'];

    unset($_SESSION['msg']);
    unset($_SESSION['type']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="30">
    <?php require "./components/_header_links.php"; ?>
    <title>EVENT | GTA 2.O</title>
</head>

<body style="background-image: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url('https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1283&q=80'); overflow-x: hidden;">
    <?php require "./components/_starUpdate.php"; ?>
    <?php require "./components/_navbar.php"; ?>
    <?php require "./components/_timers.php" ?>
    <?php $type ? require "./components/_alert.php" : ""; ?>

    <section class="container my-5">
        <?php
        if ($finish) {
            require "./components/_finish.php";
        } else if ($break) {
            require "./components/_break.php";
        } else if ($sell) {
            require "./listing/selling.php";
        } else if ($listing) {
            require "./listing/list.php"; // both listing and buying
        } else if ($accessory) {
            require "./accessories/round_acces.php";
        } else if ($round) {
            require "./dealer/round_buy.php";
        } else if ($catalog) {
            require "./dealer/catalogue.php";
        } else if ($bonus) {
            require "./components/_bonus.php";
        } else if ($sale) {
            require "./sale/bonus.php";
        } else {
            $refresh = true;
            require "./components/_refresh.php";
        }
        ?>
    </section>
    <?php (!$finish && !$break && !$catalog && !$refresh && !$bonus) ? require "./components/_footer.php" : ""; ?>
    <script src="./js/main.js"></script>
</body>
</html>