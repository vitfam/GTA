<?php
require "./components/_dbconn.php";
session_start();
if (isset($_SESSION['user']) && $_SESSION['user'] == 0) {
    header("Location: ./");
}
require "./components/_starUpdate.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="refresh" content="30">
    <?php require "./components/_header_links.php"; ?>
    <title>LEADERBOARD | GTA 2.O</title>
</head>

<body style="background-image: linear-gradient(rgba(0, 0, 0, .8), rgba(0, 0, 0, .8)), url('https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1283&q=80'); overflow-x: hidden;">
    <?php require "./components/_navbar.php"; ?>
    <div class="container">
        <?php
        $sql = "SELECT t3.user_id as PlayerID, t3.name as PlayerName, t3.amount as LeftBalance, t3.stars as Stars, t3.stars/(t5.spent) as ratio, count(t3.car_id) as Stock, count(distinct t4.type) as types, t5.spent from (select users.user_id, users.name, users.amount, users.stars, t2.car_id from users left join (select history.user_id, history.car_id from history, (Select max(transaction_id) as latest_transaction from history where mod(transaction_type,4)<>0 group by car_id) t1 where t1.latest_transaction = history.transaction_id and transaction_type in (1,3,5,7)) t2 on users.user_id = t2.user_id) t3, (select cars.car_id, model.model_id, car_type.type from cars, model, car_type where cars.model_id = model.model_id and model.type = car_type.type) t4, (select sum(model.price) as spent, history.user_id from history, cars, model where history.car_id = cars.car_id and cars.model_id = model.model_id and history.transaction_type in (1,5) group by history.user_id) t5 where t5.user_id = t3.user_id and t3.car_id = t4.car_id group by t3.user_id order BY types DESC, stars desc, LeftBalance DESC, Stock desc";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array());
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <h1 class="text-center mt-5 pt-4 mb-4">LEADERBOARD</h1>
    </div>
    <div class="container">
        <div class="table-responsive fixTableHead" style="height: 70vh;">
            <table class="table text-light text-center">
                <thead class="text-uppercase">
                    <tr>
                        <th scope="col">Rank</th>
                        <th class="text-start">Player Name</th>
                        <th>Stars</th>
                        <th>balance left</th>
                        <th>Total Cars</th>
                        <!-- <th>Ratio</th> -->
                        <!-- <th>Types</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($rows as $row) {
                        $stock = $row['Stock'] == NULL ? 0 : $row['Stock'];
                        $t = $row['types'] == 5 ? "success" : "danger";
                        $ratio = $row['ratio'] == NULL ? 0 : $row['ratio'] * 10000;
                        $ratio = number_format($ratio, 2);
                        echo '<tr>
                            <th scope="row" class="text-' . $t . '">' . $i . '</th>
                            <td class="text-start">' . $row['PlayerName'] . '</td>
                            <td>' . $row['Stars'] . '</td>
                            <td>' . $row['LeftBalance'] . '</td>
                            <td>' . $stock . '</td>
                            </tr>
                            ';
                        // <td>' . $ratio . '</td>
                        // <td>' . $row['types'] . '</td>
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="./js/main.js"></script>
</body>

</html>