<?php
// $sql = "SELECT * FROM cars, model, (SELECT history.car_id FROM history, (SELECT MAX(transaction_id) AS required_id FROM history WHERE user_id = :u and mod(transaction_type,4) <> 0 GROUP BY car_id) t1 WHERE t1.required_id = history.transaction_id AND transaction_type IN (1, 3)) t2 WHERE cars.car_id = t2.car_id AND model.model_id = cars.model_id";
$sql = "SELECT * FROM accessories";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$accs = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="modal fade" id="chooseCar<?php echo $row['car_id']; ?>" tabindex="-1" aria-labelledby="chooseCarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="chooseCarLabel">CHOOSE ONE ACCESSORY</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action='./accessories/_modifyCar.php' method='POST' style='width: 100%;'>
                    <div class="acces-list">
                        <?php
                        foreach ($accs as $acc) {
                            $acc_id = $acc['accessory_id'];
                            if ($acc['accessory_stock'] != 0) {
                                echo "
                                <label class='acces-box bg-success'>
                                    <input type='radio' name='accessory_id' value='$acc_id'>
                                    <div class='text'>
                                        <h5 class='m-0 text-uppercase fw-bold'>" . $acc['accessory_name'] . "</h5>
                                        <p class='m-0'>Price : ₹$acc[accessory_price]</p>
                                        <p class='m-0'>Stars : $acc[accessory_stars] <i class='fas fa-star text-warning'></i></p>
                                    </div>
                                </label>";
                            } else {
                                echo "
                                <label class='acces-box bg-danger' style='opacity: 0.8;'>
                                    <input type='radio' disabled>
                                    <div class='text'>
                                        <h5 class='m-0 text-uppercase fw-bold'>" . $acc['accessory_name'] . "</h5>
                                        <p class='m-0'>Price : ₹$acc[accessory_price]</p>
                                        <p class='m-0'>Stars : $acc[accessory_stars] <i class='fas fa-star text-warning'></i></p>
                                    </div>
                                </label>";
                            }
                        }
                        ?>
                    </div>
            </div>
            <div class="modal-footer">
                <button class='btn u-btn btn-buy mx-auto' type='submit' value='<?php echo $row['car_id']; ?>' name='modify'>MODIFY YOUR CAR</button>
            </div>
            </form>
        </div>
    </div>
</div>