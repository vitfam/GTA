<?php

require './inside/valid_login.php';
include '../components/_dbconn.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>VITFAM | CARS</title>
    <?php require "./inside/_links.php"; ?>
</head>

<body>
    <?php require './inside/_header.php'; ?>

    <h2 class="text-center mt-4">Welcome <?php echo $_SESSION['username']; ?></h2>

    <div class="container mt-3">
        <p class="mb-4 text-center">List of all the cars</p>
        <div class="table-responsive fixTableHead">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center px-4" scope="col">S. No.</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Mileage</th>
                        <th class="text-center">Engine</th>
                        <th class="text-center">Power</th>
                        <th class="text-center">Torque</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Stars</th>
                        <th class="text-center">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM model";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if ($rows) {
                        $i = 1;
                        foreach ($rows as $row) {
                            echo "
                            <tr>
                                <th class='text-center px-4' scope='row'>" . $i . "</th>
                                <td class='ps-5 ms-5'>" . $row['model_name'] . "</td>
                                <td class='text-center'>" . $row['mileage'] . "</td>
                                <td class='text-center'>" . $row['engine'] . "</td>
                                <td class='text-center'>" . $row['power'] . "</td>
                                <td class='text-center'>" . $row['torque'] . "</td>
                                <td class='text-center'>" . $row['type'] . "</td>
                                <td class='text-center'>" . $row['stars'] . "</td>
                                <td class='text-center'>" . $row['price'] . "</td>
                            </tr>";
                            $i++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php require './inside/_footer.php'; ?>
</body>

</html>