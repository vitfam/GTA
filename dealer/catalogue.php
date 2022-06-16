<div class="container">
    <?php
    $sql = "SELECT * FROM model WHERE model_id <= 150";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array());
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <h1 class="text-center mt-5 pt-4 mb-3">CARS LIST</h1>
</div>
<div>
    <div class="container">
        <div class="table-responsive fixTableHead">
            <table class="table table-light table-hover text-center">
                <thead class="text-uppercase">
                    <tr>
                        <th scope="col">S. No.</th>
                        <th class="text-start">Name</th>
                        <th>Engine</th>
                        <th>Mileage</th>
                        <th>Power</th>
                        <th>Torque</th>
                        <th>Type</th>
                        <th>Stars</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($rows as $row) {
                        echo '<tr>
                            <th scope="row">' . $i . '</th>
                            <td class="text-start">' . $row['model_name'] . '</td>
                            <td>' . $row['mileage'] . '</td>
                            <td>' . $row['engine'] . '</td>
                            <td>' . $row['power'] . '</td>
                            <td>' . $row['torque'] . '</td>
                            <td>' . $row['type'] . '</td>
                            <td>' . $row['stars'] . '</td>
                            <td>' . $row['price'] . '</td>
                        </tr>
                    ';
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <a href="./components/_download.php" target="_blank" class="btn btn-sm btn-warning mt-3 fw-bold text-uppercase" style="float: right;">Download</a>
    </div>
</div>