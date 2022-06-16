<div class="container">
    <?php
    $sql = "SELECT * FROM model WHERE model_id > 150";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <h1 class="text-center text-uppercase mt-5 pt-5 mb-3">Bonus Round</h1>
</div>
<div>
    <div class="container profile-car my-5">
        <div class="cars-list">
            <?php
            foreach ($rows as $row) {
                $discount_price = $row['price'] * 0.8; // 20% discount
                $row['image'] = str_replace("https://drive.google.com/file/d/", "", $row['image']);
                $row['image'] = str_replace("/view?usp=sharing", "", $row['image']);
                echo '
                    <div class="car">
                        <div class="car-image">
                            <img src="https://drive.google.com/uc?id=' . $row['image'] . '" alt="' . $row['model_name'] . '">
                        </div>
                        <div class="car-desc">
                            <h3>' . $row['model_name'] . '</h3>
                            <p class="text-warning">' . $row['type'] . '</p>
                            <div class="descp">
                                <div>
                                    <span>PRICE : <b class="text-info">₹ ' . $discount_price . '</b></span>
                                    <span>STARS : <b class="text-info"> ' . $row['stars'] . ' <i class="fas fa-star text-warning"></i></b></span> 
                                </div>
                            </div>
                        </div>
                ';
                if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'L') {
                    require './sale/_is_sale.php';
                }
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>