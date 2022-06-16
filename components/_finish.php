<section class="d-flex justify-content-center align-items-center" style="overflow: hidden; height: 100%; width: 100%;">
  <audio src="./music/break.mp3" autoplay loop="loop"></audio>
  <div class="wrapper container mt-5">
    <div class="modal--congratulations">
      <div class="modal-top">
        <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_i4zw2ddg.json" background="transparent" speed="1" style="width: 100%; height: 250px;" loop autoplay></lottie-player>
        <div class="modal-head">Congratulations <span class="text-info text-uppercase"><?php echo $_SESSION['name']; ?></span></div>
        <div class="modal-subheader">GOOD GAME<br> We will notify you about the <span class="text-success">results</span> in sometime.</div>
        <!-- <div class="modal-subheader">You've successfully <span class="text-success">completed</span> the Event. <br/> <span class="text-warning">We'll publish the result soon</span> <br> STAY TUNED.</div> -->
      </div>
      <div class="modal-bottom">
        <a href="./" role="button" class="btn u-btn u-btn--success">HOME</a>
        <form action="./logout.php" method="POST" style="width: 40%;">
          <button type="submit" name="logout" id="logoutbtn" class="w-100 btn u-btn u-btn--danger">Logout</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</section>