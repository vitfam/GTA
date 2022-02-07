<?php

require './inside/valid_login.php';
include '../components/_dbconn.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>VITFAM | LEADERBOARD</title>
    <?php require "./inside/_links.php"; ?>
</head>

<body>
    <?php require './inside/_header.php'; ?>

    <h2 class="text-center mt-4">Welcome <?php echo $_SESSION['username']; ?></h2>

    <div class="container">
        <?php
        $sql = "SELECT t3.user_id as PlayerID, t3.name as PlayerName, t3.amount as LeftBalance, t3.stars as Stars, t3.stars/(t5.spent) as ratio, count(t3.car_id) as Stock, count(distinct t4.type) as types, t5.spent from (select users.user_id, users.name, users.amount, users.stars, t2.car_id from users left join (select history.user_id, history.car_id from history, (Select max(transaction_id) as latest_transaction from history where mod(transaction_type,4)<>0 group by car_id) t1 where t1.latest_transaction = history.transaction_id and transaction_type in (1,3,5,7)) t2 on users.user_id = t2.user_id) t3, (select cars.car_id, model.model_id, car_type.type from cars, model, car_type where cars.model_id = model.model_id and model.type = car_type.type) t4, (select sum(model.price) as spent, history.user_id from history, cars, model where history.car_id = cars.car_id and cars.model_id = model.model_id and history.transaction_type in (1,5) group by history.user_id) t5 where t5.user_id = t3.user_id and t3.car_id = t4.car_id group by t3.user_id order BY types DESC, ratio DESC, stars desc, LeftBalance DESC, Stock desc";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array());
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <h5 class="text-center pt-4 mb-3">LEADERBOARD</h5>
    </div>
    <div class="container">
        <div class="table-responsive fixTableHead">
            <table class="table table-hover text-center">
                <thead class="text-uppercase table-dark">
                    <tr>
                        <th scope="col">Rank</th>
                        <th class="text-start">Player Name</th>
                        <th>Stars</th>
                        <th>balance left</th>
                        <th>Total Cars</th>
                        <th>Ratio</th>
                        <th>Types</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($rows as $row) {
                        $stock = $row['Stock'] == NULL ? 0 : $row['Stock'];
                        $num = $row['types'] == 5 ? ++$i : "--";
                        $type = $row['types'] == 5 ? "success" : "danger";
                        $ratio = $row['ratio'] == NULL ? 0 : $row['ratio'] * 10000;
                        $ratio = number_format($ratio, 2);
                        echo '<tr>
                            <th scope="row" class="text-' . $type . '">' . $num . '</th>
                            <td class="text-start">' . $row['PlayerName'] . '</td>
                            <td>' . $row['Stars'] . '</td>
                            <td>' . $row['LeftBalance'] . '</td>
                            <td>' . $stock . '</td>
                            <td>' . $ratio . '</td>
                            <td>' . $row['types'] . '</td>
                            </tr>
                            ';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php require './inside/_footer.php'; ?>
</body>

</html>