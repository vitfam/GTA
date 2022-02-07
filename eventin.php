<?php
session_start();
if(!isset($_SESSION['user']))
{
    $_SESSION['user']=0;
}
if(isset($_SESSION['user']) && $_SESSION['user']==0)
{
    header("Location: eventout.php");
}
require_once "pdo.php";
$sql="SELECT rounds FROM users WHERE user_id= :u";
$stmt= $pdo->prepare($sql);
$stmt->execute(array(
    ':u' => $_SESSION['user'],
));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$rounds=$row['rounds'];
require_once "time.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Refresh" content="20">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>vitfampage</title>
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

<body style="background-image: url(&quot;assets/img/ways-to-make-website-more-professional.jpg&quot;);background-size: cover;background-repeat: no-repeat;">
    <?php require_once "navbar.php"; ?>
    <div id="clock" style="font-family: 'Orbitron', sans-serif;color: white;font-size: 20px;text-align: center;padding: 20px; font-weight:bold;"></div>
    <?php 
        if($finish==true)
        {
            require_once "finish.php";
        }
        else if($break==true)
        {
            require_once "break.php";
        }
        else if($round5==true)
        {
            if($rounds>=5)
            {
                require_once "carchosen.php";
            }
            else
            {
                require_once "vintage.php";
            }
            
        }
        else if($round4==true)
        {
            if($rounds>=4)
            {
                require_once "carchosen.php";
            }
            else
            {
                require_once "sport.php";
            }
            
        }
        else if($round3==true)
        {
            if($rounds>=3)
            {
                require_once "carchosen.php";
            }
            else
            {
                require_once "sedan.php";
            }
            
        }
        else if($round2==true)
        {
            if($rounds>=2)
            {
                require_once "carchosen.php";
            }
            else
            {
                require_once "hatchbacks.php";
            }
            
        }
        else if($round1==true)
        {
            if($rounds>=1)
            {
                require_once "carchosen.php";
            }
            else
            {
                require_once "suv.php";
            }
            
        }
        else if($intro==true)
        {
            require_once "intro.php";
        }

    ?>
    <?php require_once "footer.php";?> 
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="clock.js"></script>
</body>

</html>