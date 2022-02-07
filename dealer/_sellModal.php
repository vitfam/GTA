<div class="modal fade" id="sellNow<?php echo $row['car_id']; ?>" tabindex="-1" aria-labelledby="sellNowLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="sellNowLabel">SELL NOW</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-between">
                <div class="left">
                    <h3 class="text-primary text-uppercase"><?php echo $row['model_name']; ?></h3>
                    <p><?php echo $row['type']; ?></p>
                    <p class="text-uppercase text-danger fw-bold">After Depreciation of <?php echo "10%"; ?></p>
                    <div>STARS : <b class="text-success"><?php echo $row['current_stars'] - 0.5; ?></b></div>
                    <div>PRICE : <b class="text-success">₹ <?php echo $row['current_price'] - (0.1 * $row['current_price']); ?></b></div>
                </div>
                <div class="right car-image align-self-center" style="width: 50%; border-radius: 10px; overflow: hidden;">
                    <img width="100%" src="https://drive.google.com/uc?id=<?php echo $row['image']; ?>" alt="<?php echo $row['cars']; ?>">
                </div>
            </div>
            <div class="modal-footer">
                <form action='./dealer/_sell.php?x=<?php echo $row['car_id']; ?>' method='POST' style='width: 100%;'>
                    <button class='btn u-btn btn-sell mx-auto' type='submit' value='SELL' name='SELL'>CLICK TO SELL</button>
                </form>
            </div>
        </div>
    </div>
</div>