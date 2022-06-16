<div class="modal fade" id="buyNow<?php echo $row['model_id']; ?>" tabindex="-1" aria-labelledby="buyNowLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="buyNowLabel">BUY NOW</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-between">
                <div class="left">
                    <h3 class="text-primary text-uppercase"><?php echo $row['model_name']; ?></h3>
                    <p><?php echo $row['type']; ?></p>
                    <div>MILEAGE : <b class="text-success"><?php echo $row['mileage']; ?> KM/L</b></div>
                    <div>ENGINE : <b class="text-success"><?php echo $row['engine']; ?> CC</b></div>
                    <div>POWER : <b class="text-success"><?php echo $row['power']; ?> BHP</b></div>
                    <div>TORQUE : <b class="text-success"><?php echo $row['torque']; ?> NM</b></div>
                    <div>STARS : <b class="text-success"><?php echo $row['stars']; ?></b></div>
                    <div>PRICE : <b class="text-success">₹ <?php echo $row['price']; ?></b></div>
                </div>
                <div class="right car-image align-self-center" style="width: 50%; border-radius: 10px; overflow: hidden;">
                    <img width="100%" src="https://drive.google.com/uc?id=<?php echo $row['image']; ?>" alt="<?php echo $row['cars']; ?>">
                </div>
            </div>
            <div class="modal-footer">
                <form action='./dealer/_buy.php' method='POST' style='width: 100%;'>
                    <button class='btn u-btn btn-buy mx-auto' type='submit' value='<?php echo $row['model_id']; ?>' name='BUY'>CLICK TO BUY</button>
                </form>
            </div>
        </div>
    </div>
</div>