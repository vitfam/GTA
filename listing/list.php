<?php

    if(isset($_POST['sellList'])){
        $sellList = $_POST['sellList'];
        if($sellList == 'dealer'){
            require "./dealer/round_sell.php";
        }
        else if($sellList == 'participant'){
            require "./listing/selling.php";
        }
    } else {
        echo '
            <div class="container listing" style="height: 70vh; overflow: hidden;">
                <form action="' . $_SERVER['PHP_SELF'] . '" method="post" class="d-flex justify-content-between align-items-center" style="height: 100%;">
                    <button class="btn u-btn btn-sell fs-3" name="sellList" value="dealer" >SELL BACK TO DEALER</button>
                    <button class="btn u-btn btn-sell fs-3" name="sellList" value="participant" >SELL TO PARTICIPANT</button>
                </form>
            </div>
        ';
    }
