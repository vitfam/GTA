<div class="modal fade" id="listNow<?php echo $row['car_id']; ?>" tabindex="-1" aria-labelledby="listNowLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="listNowLabel">LIST THE CAR</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action='./listing/_sell.php' method='POST' style='width: 100%;'>
                <div class="modal-body d-flex justify-content-between">
                    <div class="left">
                        <h3 class="text-primary text-uppercase"><?php echo $row['model_name']; ?></h3>
                        <p><?php echo $row['type']; ?></p>
                        <p class="text-uppercase fw-bold">Current value</p>
                        <div>PRICE : <b class="text-success">₹ <?php echo $row['current_price']; ?></b></div>
                        <p class="text-uppercase mt-3 fw-bold">Your value</p>
                        <input type="text" class="form-control my-3" name="user_price" placeholder="Your Price" />
                    </div>
                    <div class="right car-image d-flex align-items-center justify-content-center" style="width: 50%; height: 100%; border-radius: 10px; overflow: hidden;">
                        <img class="d-flex align-self-center" width="100%" src="https://drive.google.com/uc?id=<?php echo $row['image']; ?>" alt="<?php echo $row['cars']; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class='btn u-btn btn-sell mx-auto' type='submit' value='<?php echo $row['car_id']; ?>' name='LIST'>CLICK TO LIST</button>
                </div>
            </form>
        </div>
    </div>
</div>