<?php
session_start();
if(!isset($_SESSION['user']))
{
    $_SESSION['user']=0;
}
if(isset($_SESSION['user']) && $_SESSION['user']!=0)
{
    header("Location: eventout.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>VITFAM</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-with-social-media-icons-1.css">
    <link rel="stylesheet" href="assets/css/Footer-with-social-media-icons.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body class="flex-grow-1" style="background-image: url(&quot;assets/img/hero-bg.png&quot;);background-size: cover;background-repeat: no-repeat;background-position: center;">
    <?php require_once "navbar.php"; ?>
    <section style="padding: 93px;">
        <div class="row text-center align-items-center">
            <div class="col">
                <h1 style="padding: 27px;">Welcome to VITFAM Events</h1><button class="btn btn-primary" type="button" onclick="location.href='eventout.php'">Check Out our ongoing event</button></div>
        </div>
    </section>
    <?php require_once "footer.php";?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>