<?php
    $sqluser = "SELECT * FROM users WHERE user_id = :u";
    $stmtuser = $pdo->prepare($sqluser);
    $stmtuser->execute(array(
        ':u' => $_SESSION['user'],
    ));
    $rowuser = $stmtuser->fetch(PDO::FETCH_ASSOC);
?>

<div class="timer container-fluid position-fixed">
    <div class="text-uppercase">BALANCE : <span class="text-info"><?php echo $rowuser['amount']; ?></span> | STARS : <span class="text-info"><?php echo $rowuser['stars']; ?></span></div>
    <div id="clock"></div>
    <div id="time-left"></div>
</div>

<script type="module" src="./js/timers.js"></script>