<div class="startTimer my-4">
    <audio id="main_music" src="./music/GTA.mp3" loop="loop" autoplay></audio>
    <div class="starting" id="starting">
        <div class="align-items-center justify-content-between d-flex mb-3">
            <h2 class="">Starting in</h2>
        </div>
        <div class="ctimer d-flex justify-content-between align-items-center">
            <div class="timer-item">
                <div class="timer-item-number">
                    <span id="days">00</span>
                </div>
                <div class="timer-item-label">
                    <span class="label">Days</span>
                </div>
            </div>
            <span>:</span>
            <div class="timer-item">
                <div class="timer-item-number">
                    <span id="hours">00</span>
                </div>
                <div class="timer-item-label">
                    <span class="label">Hours</span>
                </div>
            </div>
            <span>:</span>
            <div class="timer-item">
                <div class="timer-item-number">
                    <span id="minutes">00</span>
                </div>
                <div class="timer-item-label">
                    <span class="label">Minutes</span>
                </div>
            </div>
            <span>:</span>
            <div class="timer-item">
                <div class="timer-item-number">
                    <span id="seconds">00</span>
                </div>
                <div class="timer-item-label">
                    <span class="label">Seconds</span>
                </div>
            </div>
        </div>

        <div id="ready">
            <h2 class="ml4 text-uppercase">
                <span class="letters letters-1">Ready</span>
                <span class="letters letters-2">Set</span>
                <span class="letters letters-3">Go!</span>
            </h2>
        </div>
        <audio id="ready_music" src="./music/GTA_start.mp3"></audio>
    </div>

    <?php
    if ($_SESSION['user'] == 0) {
        echo '<div class="starting" id="started">
                    <h2>Event started | login & participate now</h2>
                </div>
            ';
    } else {
        echo '<div id="started">
                    <a class="btn btn-primary btn-game" href="./event.php">START NOW</a>
                </div>
            ';
    }
    ?>

    <div class="starting" id="ended">
        <h2>Event is over</h2>
    </div>
</div>

<script type="module" src="./js/countdown.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>