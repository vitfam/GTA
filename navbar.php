<nav class="navbar navbar-light navbar-expand-md sticky-top" style="background-color:rgba(255,255,255,0.9);">
        <div class="container-fluid"><a class="navbar-brand" href="index.php"><img src="assets/img/logogreen.png" style="height:70px"></a>
                                   
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation" style="opacity: 1;"></li>
                    <?php if($_SESSION['user']==0){echo("<li class=\"nav-item\" role=\"presentation\">  <a class=\"nav-link\" href=\"login.php\"><strong>Log In</strong></a></li>");} ?>
                    <?php echo("<li class=\"nav-item\" role=\"presentation\"><a class=\"nav-link\" href=\"eventout.php\"><strong>Event</strong></a></li>"); ?>
                    
                    
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"></li>
                </ul>
                <ul class="nav navbar-nav">
                    <?php if($_SESSION['user']!=0){echo("<li class=\"nav-item\" role=\"presentation\">  <a class=\"nav-link\" href=\"my_account.php\"><strong>My Account</strong></a></li>");} ?>
                    <?php if($_SESSION['user']!=0){echo("<li class=\"nav-item\" role=\"presentation\">  <a class=\"nav-link\" href=\"logout.php\"><strong>Log Out</strong></a></li>");} ?>
                </ul>
            </div>
        </div>
    </nav>
