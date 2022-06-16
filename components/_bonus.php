<?php
    $clear = "UPDATE users INNER JOIN (select sum(cars.current_price) as sp, sum(cars.current_stars) as ss, users.user_id from history, cars, users, (select max(transaction_id) as last_transaction from history group by car_id) t1 where history.transaction_id = t1.last_transaction AND history.transaction_type = 2 AND users.user_id = history.user_id AND cars.car_id = history.car_id group by history.user_id) t2 ON users.user_id = t2.user_id SET users.amount = users.amount-sp, users.stars = users.stars+ss";
    $stmt = $pdo->prepare($clear);
    $stmt->execute();

    if($stmt){
        $car_back = "INSERT INTO history (user_id, car_id, transaction_type) select history.user_id, history.car_id, 7 from history, (select max(transaction_id) as latest_transaction from  history group by car_id) t1 where history.transaction_id = t1.latest_transaction and history.transaction_type = 2";
        $stmt = $pdo->prepare($car_back);
        $stmt->execute();
    }
?>

<section class="modal-box">
    <audio src="./music/break.mp3" autoplay loop="loop"></audio>
    <div class="container">
        <h2 class="text-uppercase text-info">Something else for you</h2>
        <p>You did a great job. Please have a break for <span class="text-warning">two minutes</span>.</p>
    </div>
</section>
