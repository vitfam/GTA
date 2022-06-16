<?php

$car_details = 'SELECT * FROM cars, model, (SELECT history.car_id FROM history, (SELECT MAX(transaction_id) AS required_id FROM history WHERE user_id = :ui and mod(transaction_type,4) <> 0 GROUP BY car_id) t1 WHERE t1.required_id = history.transaction_id AND mod(transaction_type,2)=1) t2 WHERE cars.car_id = t2.car_id AND model.model_id = cars.model_id';
$res = $pdo->prepare($car_details);
$res->execute(array(
    ':ui' => $row['user_id']
));
$details = $res->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="modal fade" id="allDetails<?php echo $row['user_id']; ?>" tabindex="-1" aria-labelledby="allDetailsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="allDetailsLabel">History of <?php echo $row['name']; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <div class="d-flex align-items-start mb-3">
                    <div>
                        <img height="100px" src="https://avatars.dicebear.com/api/initials/:<?php echo $row['name']; ?>hello.svg" alt="avatar">
                    </div>
                    <div class="ms-3">
                        <p>Name : <?php echo $row['name']; ?></p>
                        <p>Balance Left : <?php echo $row['amount']; ?></p>
                        <p>Stars : <?php echo $row['stars']; ?></p>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="table-responsive fixTableHead">
                        <table class="table table-hover caption-top">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-center px-4" scope="col">S. No.</th>
                                    <th class="text-center">Car Name</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Rating</th>
                                    <th class="text-center">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($details) {
                                    $i = 1;
                                    foreach ($details as $d) {
                                        // <th class='text-center px-4' scope='row'>" . $d['car_id'] . "</th>
                                        echo "
                                        <tr>
                                                <th class='text-center px-4' scope='row'>" . $i . "</th>
                                                <td class='ps-5 ms-5'>" . $d['model_name'] . "</td>
                                                <td class='text-center'>" . $d['type'] . "</td>
                                                <td class='text-center'>" . $d['current_stars'] . "</td>
                                                <td class='text-center'>" . $d['current_price'] . "</td>
                                            </tr>";
                                        $i++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>