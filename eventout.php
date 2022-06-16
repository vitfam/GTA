<?php
session_start();
if(!isset($_SESSION['user']))
{
    $_SESSION['user']=0;
}
if(isset($_SESSION['user']) && $_SESSION['user']!=0)
{
    header("Location: eventin.php");
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

<body style="background-size: cover;background-repeat: no-repeat;background-image: url(&quot;assets/img/ways-to-make-website-more-professional.jpg&quot;);">
<?php require_once "navbar.php"; ?>
    <div id="prom">
        <div class="jumbotron">
            <h1>Grand Thrift Auto</h1>
            <p></p>
            <p><a class="btn btn-primary" role="button" href="login.php">Login to Enter the Event</a></p>
        </div>
    </div>
    <?php require_once "footer.php";?> 
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>